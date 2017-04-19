# Google Analytics Tracking for Laravel

## Introduction

Other Google Analytics packages for Laravel are designed to consume analytics data via the Google API and allow you to process it on your Laravel site. Not this one.

Instead this does the ridiculously straightforward task of extracting your Google Analytics tracking ID from your Laravel .env file and injecting it into the a Blade view intended for inclusion in your base layout.

The only wrinkle is that if you don't set the tracking ID in your .env file the Google script won't be included in your site. This is deliberate as it can be marginally useful for development and staging environments.

## Installation

Add the package to your project

```
composer require petercoles/laravel-google-analytics-tracking
```

Add the service provider to the providers list in your config/app.php file

```
'providers' => [
    // ...
    PeterColes\LaravelGoogleAnalyticsTracking\GoogleAnalyticsTrackingServiceProvider::class,
    // ...
],
```

Include the Blade view in your base layout
```
@include('google-analytics::script')
```
Traditionally this was placed near the closing body tag. However as the script is now loaded asynchronously, it can be added anywhere where a script tag is legitimate.

On your production server, set your tracking code in the .env file
```
GOOGLE_ANALYTICS_TRACKING_ID=UA-XXXXXXXX-X
```

## License

This package is licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Final Note

If you've got this far, you're probably thinking "Couldn't I just cut and paste the Google script into my base layout?", to which the answer is "Absolutely!". I built this package only because I was doing this so often that it had begun to feel like a code smell and I wanted to [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) up this piece of my applications. I also wanted the additional benefit of separating the tracking ID from the script to reduce the risk of accidentally reusing another site's tracking ID.
