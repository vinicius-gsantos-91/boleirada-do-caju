<?php

declare(strict_types=1);

namespace Modules\Auth\App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\User\App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterPost extends Controller
{
    /**
     * Executes user registration
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function execute(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $params = $request->all();

        User::create([
            'first_name' => $params['first_name'],
            'last_name' => $params['last_name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password']),
        ]);

        $request->session()->flash('success', 'Cadastro realizado com sucesso!');
        return redirect()->intended('auth/login');
    }
}
