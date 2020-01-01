<?php

namespace NotificationChannels\Workplace;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\ServiceProvider;

class WorkplaceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(WorkplaceChannel::class)
            ->needs(ClientInterface::class)
            ->give(function ($app) {
                return $app->make(HttpClient::class);
            });
    }
}
