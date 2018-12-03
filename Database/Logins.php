<?php

namespace Saaora\Database;

use Illuminate\Support\Facades\Schema;

class Logins
{
    const TABLE = 'logins';

    public static function boot()
    {
        if (!Schema::hasTable('logins')) {
            Schema::create('logins', function ($table) {
                $table->increments('id')->unique();
                $table->string('username', 60)->unique();
                $table->string('password', 255);
                $table->timestamps();
            });
        }
    }
}
