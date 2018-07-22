<?php

namespace App\Http\Middleware\Model;

use Closure;
use Illuminate\Http\Request;
use App\Domain\Model\Model;

/**
 * Class Exists
 * @package App\Http\Middleware\Engine
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
        $model = Model::query()->find((int) $oRequest->route('id'));

        if ($model === null) {
            return redirect()->route('home.index');
        }

        return $oNext($oRequest);
    }
}
