<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!app()->environment('local')) {
            URL::forceScheme('https');
        }

        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Setting::observe(\App\Observers\SettingObserver::class);
        \App\Models\SettingItem::observe(\App\Observers\SettingItemObserver::class);
        \App\Models\Project::observe(\App\Observers\ProjectObserver::class);
        \App\Models\GalleriesProject::observe(\App\Observers\GalleriesProjectObserver::class);
        \App\Models\ImageSlider::observe(\App\Observers\ImageSliderObserver::class);
        \App\Models\AboutUs::observe(\App\Observers\AboutUsObserver::class);
        \App\Models\Berita::observe(\App\Observers\BeritaObserver::class);
        \App\Models\Logo::observe(\App\Observers\LogoObserver::class);
    }
}
