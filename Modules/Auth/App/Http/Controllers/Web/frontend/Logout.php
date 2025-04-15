<?php

declare(strict_types=1);

namespace Modules\Auth\App\Http\Controllers\Web\frontend;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout
{
    /**
     * Executes logout act
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function execute(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->flash(
            'success',
            'Checkout realizado! Nos vemos em breve'
        );
        return Redirect()->intended('auth/login');
    }
}
