<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Domain\Car\Model as Car;

/**
 * Class CarController
 * @package App\Http\Controllers\Car
 */
class CarController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        return view('car.index', ['cars' => Car::with(['model', 'engine', 'coupeType', 'model.brand'])->get()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        return view('car.form');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $car = Car::query()->find($id);

        return view('car.form', ['car' => $car]);
    }

    /**
     * @param \App\Http\Requests\Car\Request $request
     * @return JsonResponse
     */
    public function store(\App\Http\Requests\Car\Request $request)
    {
        $post = $request->all();

        $car = Car::query()->create($post);
        $this->syncImage($request, $car);

        $request->session()->flash('success', 'Your Car details have all been saved.');

        return redirect()->route('car.index');
    }

    /**
     * @param \App\Http\Requests\Car\Request $request
     * @param int                              $id
     * @return JsonResponse
     */
    public function update(\App\Http\Requests\Car\Request $request, $id)
    {
        $post = $request->all();

        $car = Car::query()->find($id);
        $car->update($post);
        $this->syncImage($request, $car);

        $request->session()->flash('success', 'Your Car details have been updated.');

        return redirect()->route('car.edit', ['id' => $id]);
    }

    /**
     * @param \App\Http\Requests\Car\Request $request
     * @param Car                            $car
     */
    private function syncImage(\App\Http\Requests\Car\Request $request, $car)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $folder = public_path('images/');

            // if file is not an image use default one
            if (!in_array($file->getClientOriginalExtension(), ['png', 'jpg', 'jpeg'])) {
                $filename = 'No_Image_Available.gif';
            } else { // create or replace existing image
                $filename = $car->getKey().'.'.$file->getClientOriginalExtension();

                try {
                    $file->move($folder, $filename);
                } catch (\Exception $e) {
                    \Log::error($e->getMessage(), ['filename' => $filename]);
                }
            }

            $car->update(['image_url' => $filename]);
        }
    }
}
