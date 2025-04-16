<?php

declare(strict_types=1);

namespace Modules\Auth\App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginPost extends Controller
{
    public function execute(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('error', 'E-mail ou senha inválidos.');
        }

        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }
}
