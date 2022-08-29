<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $this->bootSettings();

    }


    protected function bootSettings()
    {
        $settings = Cache::get('app-settings');
        if(!$settings)
        {
            $settings = Setting::all();
            Cache::put('app-settings' , $settings);
        }
        foreach($settings as $setting)
        {
            config()->set($setting->name , $setting->value);
            // Config::set();
        }
    }
}
