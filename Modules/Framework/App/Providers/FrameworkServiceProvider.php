<?php

namespace Modules\Framework\App\Providers;

use Modules\Framework\App\Model\ModuleBaseFiles\AbstractServiceProvider;

class FrameworkServiceProvider extends AbstractServiceProvider
{
    protected string $moduleName = 'Framework';
    protected string $moduleNameLower = 'framework';
}
