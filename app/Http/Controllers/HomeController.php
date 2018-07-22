<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use App\Domain\CoupeType\Model as CoupeType;
use App\Domain\Brand\Model as Brand;
use App\Domain\Engine\Model as Engine;
use App\Domain\Car\Model as Car;

/**
 * Class HomeController
 * @package App\Http\Controllers\Home
 */
class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $cars = null;

        if (!empty($filters)) {
            $cars = Car::listing($filters);
        }

        $coupeTypes = array_prepend(
            CoupeType::all()->pluck('name', 'id')->toArray(),
        'Select Coupe Type',
            ''
        );
        $brands = array_prepend(
            Brand::byActive(1)->pluck('name', 'id')->toArray(),
            'Select Brand',
            ''
        );
        $engines = array_prepend(
            Engine::byActive(1)->pluck('name', 'id')->toArray(),
            'Select Engine',
            ''
        );

        return view('home', [
            'coupeTypes' => $coupeTypes,
            'brands' => $brands,
            'engines' => $engines,
            'cars' => $cars,
        ]);
    }
}
