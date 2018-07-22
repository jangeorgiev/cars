<?php

namespace App\Http\Middleware\Engine;

use Closure;
use Illuminate\Http\Request;
use App\Domain\Engine\Model as Engine;

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
        $engine = Engine::query()->find((int) $oRequest->route('id'));

        if ($engine === null) {
            return redirect()->route('home.index');
        }

        return $oNext($oRequest);
    }
}
