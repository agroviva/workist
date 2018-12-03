<?php
namespace Saaora\Database;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

class Logins
{
    const TABLE = "logins";

    static function boot(){
    	if (!Schema::hasTable('logins'))
		{
		    Schema::create('logins', function($table)
			{
			    $table->increments('id')->unique();
			    $table->string('username', 60)->unique();
			    $table->string('password', 255);
			});
		}
    }
}