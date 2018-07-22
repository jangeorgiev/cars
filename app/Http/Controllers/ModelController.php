<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Domain\Model\Model;
use App\Domain\Brand\Model as Brand;

/**
 * Class ModelController
 * @package App\Http\Controllers\Model
 */
class ModelController extends Controller
{
    /**
     * @param \App\Http\Requests\Model\Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(\App\Http\Requests\Model\Request $request)
    {
        $get = Arr::only($request->all(), ['brand_id']);

        if (isset($get['brand_id'])) {
            $models = Model::byBrand($get['brand_id'])->get();
        } else {
            $models = Model::all();
        }

        $brands = array_prepend(
            Brand::all()->pluck('name', 'id')->toArray(),
            'Select Brand',
            ''
        );

        return view('model.index', ['brands' => $brands, 'models' => $models]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('model.form');
    }

    /**
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $model = Model::with('brand')->find($id);

        return view('model.form', ['model' => $model]);
    }

    /**
     * @param \App\Http\Requests\Model\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(\App\Http\Requests\Model\Request $request)
    {
        Model::query()->create($request->all());

        $request->session()->flash('success', 'Your Model details have all been saved.');

        return redirect()->route('model.index');
    }

    /**
     * @param \App\Http\Requests\Model\Request $request
     * @param int                               $id
     * @return JsonResponse
     */
    public function update(\App\Http\Requests\Model\Request $request, $id)
    {
        $model = Model::query()->find($id);
        $model->update($request->all());

        $request->session()->flash('success', 'Your Model details have been updated.');

        return redirect()->route('model.edit', ['id' => $id]);
    }

    /**
     * @param Request $request
     * @param int     $brandId
     * @param null    $active
     * @return array|JsonResponse
     */
    public function getModelsByBrand(Request $request, $brandId, $active = null)
    {
        $models = [];

        if ($request->ajax()) {
            $query = Model::query()->byBrand($brandId);

            if (!is_null($active)) {
                $query->byActive($active);
            }

            $models = $query->pluck('name', 'id')->toArray();

            return response()->json(['models' => $models]);
        }

        return $models;
    }
}
