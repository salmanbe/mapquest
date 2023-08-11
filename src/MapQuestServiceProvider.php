<?php

namespace Salmanbe\MapQuest;

use Illuminate\Support\ServiceProvider;
      
class MapQuestServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind('mapquest', function($app) {
            return new MapQuest($app);
        });        
    }
}