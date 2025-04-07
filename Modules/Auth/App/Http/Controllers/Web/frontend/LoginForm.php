<?php

declare(strict_types=1);

namespace Modules\Auth\App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginForm extends Controller
{
    /**
     * Generates login form page
     *
     * @return View
     */
    public function execute(): View
    {
        return view('auth::login');
    }
}
