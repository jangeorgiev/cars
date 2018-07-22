<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Domain\Brand\Model as Brand;

/**
 * Class BrandController
 * @package App\Http\Controllers\Brand
 */
class BrandController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        return view('brand.index', ['brands' => Brand::all()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        return view('brand.form');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $brand = Brand::query()->find($id);

        return view('brand.form', ['brand' => $brand]);
    }

    /**
     * @param \App\Http\Requests\Brand\Request $request
     * @return JsonResponse
     */
    public function store(\App\Http\Requests\Brand\Request $request)
    {
        $post = $request->all();
        Brand::query()->create($post);

        $request->session()->flash('success', 'Your Brand details have all been saved.');

        return redirect()->route('brand.index');
    }

    /**
     * @param \App\Http\Requests\Brand\Request $request
     * @param int                              $id
     * @return JsonResponse
     */
    public function update(\App\Http\Requests\Brand\Request $request, $id)
    {
        $post = $request->all();
        $brand = Brand::query()->find($id);
        $brand->update($post);

        $request->session()->flash('success', 'Your Brand details have been updated.');

        return redirect()->route('brand.edit', ['id' => $id]);
    }
}
