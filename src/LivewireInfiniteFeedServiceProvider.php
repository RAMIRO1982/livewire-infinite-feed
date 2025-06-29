<?php

namespace RAMIRO1982\LivewireInfiniteFeed;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use RAMIRO1982\LivewireInfiniteFeed\Components\InfiniteFeed;

class LivewireInfiniteFeedServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'infinite-feed');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/infinite-feed'),
        ], 'views');

        Livewire::component('infinite-feed', InfiniteFeed::class);
    }
}
