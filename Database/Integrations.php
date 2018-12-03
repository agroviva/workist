<?php

namespace Saaora\Database;

use Illuminate\Support\Facades\Schema;

class Integrations
{
    const TABLE = 'integrations';
    const API = ['google', 'facebook'];

    public static function boot()
    {
        if (!Schema::hasTable('integrations')) {
            Schema::create('integrations', function ($table) {
                $table->increments('id')->unique();
                $table->string('email', 255)->unique();
                $table->enum('api', self::API)->nullable();
                $table->timestamps();
            });
        }
    }
}
