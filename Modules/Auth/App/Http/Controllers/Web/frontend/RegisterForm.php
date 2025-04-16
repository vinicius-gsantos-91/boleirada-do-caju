<?php

declare(strict_types=1);

namespace Modules\Auth\App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;

class RegisterForm extends Controller
{
    public function execute()
    {
        return view('auth::register');
    }
}
