<?php

namespace Saaora\Database;

use Illuminate\Support\Facades\Schema;

class Users
{
    const TABLE = 'users';

    public static function boot()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function ($table) {
                $table->increments('id')->unique();
                $table->string('username', 60)->unique();
                $table->string('firstname', 60);
                $table->string('lastname', 60);
                $table->string('email', 255)->unique();
                $table->enum('status', ['active', 'disabled', 'deleted'])->default('active');
                $table->timestamps();
            });
        }
    }
}
