<?php

namespace PeterColes\LaravelGoogleAnalyticsTracking;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GoogleAnalyticsTrackingServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/', 'google-analytics');

        View::composer('google-analytics::script', function ($view) {
            $view->with('gaTrackingId', env('GOOGLE_ANALYTICS_TRACKING_ID'));
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
