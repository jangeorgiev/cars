<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Domain\Engine\Model as Engine;

/**
 * Class EngineController
 * @package App\Http\Controllers\Engine
 */
class EngineController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        return view('engine.index', ['engines' => Engine::all()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        return view('engine.form');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $engine = Engine::query()->find($id);

        return view('engine.form', ['engine' => $engine]);
    }

    /**
     * @param \App\Http\Requests\Engine\Request $request
     * @return JsonResponse
     */
    public function store(\App\Http\Requests\Engine\Request $request)
    {
        Engine::query()->create($request->all());

        $request->session()->flash('success', 'Your Engine details have all been saved.');

        return redirect()->route('engine.index');
    }

    /**
     * @param \App\Http\Requests\Engine\Request $request
     * @param int                               $id
     * @return JsonResponse
     */
    public function update(\App\Http\Requests\Engine\Request $request, $id)
    {
        $engine = Engine::query()->find($id);
        $engine->update($request->all());

        $request->session()->flash('success', 'Your Engine details have been updated.');

        return redirect()->route('engine.edit', ['id' => $id]);
    }
}
