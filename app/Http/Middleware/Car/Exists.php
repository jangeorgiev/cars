<?php

namespace App\Http\Middleware\Car;

use Closure;
use Illuminate\Http\Request;
use App\Domain\Car\Model as Car;

/**
 * Class Exists
 * @package App\Http\Middleware\Car
 */
class Exists
{
    /**
     * @param Request $oRequest
     * @param Closure $oNext
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $oRequest, Closure $oNext)
    {
        $car = Car::query()->find((int) $oRequest->route('id'));

        if ($car === null) {
            return redirect()->route('home.index');
        }

        return $oNext($oRequest);
    }
}
