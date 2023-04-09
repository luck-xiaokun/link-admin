<?php
declare(strict_types=1);

namespace Link\LinkAdmin;

use Illuminate\Support\ServiceProvider as frameServiceProvider;

class ServiceProvider extends frameServiceProvider
{

    public function register()
    {
        $this->registerPublishes();
    }

    public function boot()
    {

    }

    /**
     * 发布至config
     * @return void
     * @develop yikun.lu
     * 2023/4/9
     */
    protected function registerPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/Config/linkCore.php' => config_path("linkCore.php"),
            __DIR__ . '/Config/linkAuth.php' => config_path("linkAuth.php"),
        ]);
    }


}
