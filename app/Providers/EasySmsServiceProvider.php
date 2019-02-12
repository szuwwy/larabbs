<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Overtrue\EasySms\EasySms;

class EasySmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //绑定到容器的对象只会被解析一次，之后的调用都返回相同的实例，以下两种写法等同
        //绑定后可以在其他地方用app函数调用实例，$sms = app('easysms');
        // $this->app->singleton(EasySms::class, function ($app) {
        //     return new EasySms(config('easysms'));
        // });

        // $this->app->alias(EasySms::class, 'easysms');

        $this->app->singleton('easysms', function ($app) {
            return new EasySms(config('easysms'));
        });
    }
}