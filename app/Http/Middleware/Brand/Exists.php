<?php

namespace App\Http\Middleware\Brand;

use Closure;
use Illuminate\Http\Request;
use App\Domain\Brand\Model as Brand;

/**
 * Class Exists
 * @package App\Http\Middleware\Brand
 */
class Exists
{
    /**
     * @param Request $request
     * @param Closure $next
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $brand = Brand::query()->find((int) $request->route('id'));

        if ($brand === null) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Invalid Brand Id']);
            }

            return redirect()->route('home.index');
        }

        return $next($request);
    }
}
