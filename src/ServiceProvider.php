<?php
namespace Lynk\LynkAdmin;

use Illuminate\Support\ServiceProvider as frameServiceProvider;

class ServiceProvider extends frameServiceProvider
{
    protected array $middleware = [];

    public function register()
    {
        $this->registerBase();
        $this->registerRouterOrMiddleware();
        $this->registerPublishes();
    }

    protected function registerBase()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/lynkCore.php','lynkCore');
    }

    protected function registerRouterOrMiddleware()
    {
        //注册中间键
        foreach ($this->middleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }
        //注册路由
        $this->loadRoutesFrom(__DIR__.'/Router/admin.php');
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
