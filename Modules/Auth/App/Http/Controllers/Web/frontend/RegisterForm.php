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

class RegisterForm extends Controller
{
    public function execute()
    {
        return view('auth::register');
    }
}
