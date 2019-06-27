<?php

namespace Jxlwqq\Echarts;

use Illuminate\Support\ServiceProvider;

class EchartsServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(Echarts $extension)
    {
        if (!Echarts::boot()) {
            return;
        }


        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/echarts')],
                'laravel-admin-echarts'
            );
        }
    }
}
