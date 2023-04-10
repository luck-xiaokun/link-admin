<?php
declare(strict_types=1);

namespace Lynk\LynkAdmin;

use Illuminate\Support\ServiceProvider as frameServiceProvider;

class ServiceProvider extends frameServiceProvider
{

    public function register()
    {
        $this->registerPublishes();
    }

    /**
     * 内容发布
     * @return void
     * @develop yikun.lu
     * 2023/4/9
     */
    protected function registerPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/Config/lynkCore.php' => config_path("lynkCore.php"),
            __DIR__ . '/Config/lynkAuth.php' => config_path("lynkAuth.php"),
        ]);
    }


}
