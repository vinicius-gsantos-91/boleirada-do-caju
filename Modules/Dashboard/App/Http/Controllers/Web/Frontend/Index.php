<?php

declare(strict_types=1);

namespace Modules\Dashboard\App\Http\Controllers\Web\Frontend;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class Index extends Controller
{
    /**
     * Generates dashboard page
     *
     * @return View
     */
    public function execute(): View
    {
        return view('dashboard::index');
    }
}
