<?php

namespace EvgenyL\Q5TAPIClient;

use Illuminate\Support\ServiceProvider;

class Q5TAPIClientServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Q5TAPIClient::class, function ($app) {
            $httpClient = new \GuzzleHttp\Client([
                // Guzzle 6.x option format
                'base_uri' => config('services.q5t_api.api_url'),
                'timeout'  => config('services.q5t_api.timeout'),
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer '.config('services.q5t_api.access_token'),
                ],
            ]);
            $client = new Q5TAPIClient($httpClient);
            return $client;
        });
    }

}
