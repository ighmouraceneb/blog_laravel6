<?php

namespace App\Providers;

use App\Repositories\Contracts\TopicRepository;
use App\Repositories\Eloquent\EloquentTopicRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TopicRepository::class, EloquentTopicRepository::class);
    }
}
