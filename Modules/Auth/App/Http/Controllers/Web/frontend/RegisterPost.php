<?php
/**
 * @author      Webjump Core Team <dev@webjump.ai>
 * @copyright   2025 Webjump (https://www.webjump.ai)
 * @license     https://www.webjump.ai  Copyright
 * @link        https://www.webjump.ai
 */
declare(strict_types=1);

namespace Modules\Auth\App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterPost extends Controller
{
    public function execute(Request $request)
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

        return redirect()->intended('auth/login');
    }
}
