<?php

declare(strict_types=1);

namespace Modules\BettingPool\App\Providers;

use Illuminate\Support\ServiceProvider;

class BettingPoolServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'BettingPool';
    protected string $moduleNameLower = 'bettingpool';

    public function boot(): void
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/migrations'));
    }
}
