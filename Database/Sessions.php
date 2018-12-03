<?php

namespace Saaora\Database;

use Illuminate\Support\Facades\Schema;

class Sessions
{
    const TABLE = 'Sessions';

    public static function boot()
    {
        if (!Schema::hasTable('sessions')) {
            Schema::create('sessions', function ($table) {
                $table->string('id')->unique();
                $table->unsignedInteger('user_id')->nullable();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->text('payload');
                $table->integer('last_activity');
            });
        }
    }
}
