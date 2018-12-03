<?php

namespace Saaora\Database;

use Illuminate\Support\Facades\Schema;

class Workspace
{
    const TABLE = 'workspace';

    public static function boot()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function ($table) {
                $table->increments('id')->unique();
                $table->string('name', 60)->unique();
                $table->integer('assigned_to');
                $table->integer('created_by')->nullable();
                $table->timestamps();
            });
        }
    }
}
