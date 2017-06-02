<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Node;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Node::saving(function($node){
            echo 'saving event is fired<br>';
        });

        Node::creating(function($node){
            echo 'creating event is fired<br>';
        });

        Node::created(function($node){
            echo 'created event is fired<br>';
        });

        Node::saved(function($node){
            echo 'saved event is fired<br>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
