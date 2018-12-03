<?php
namespace Saaora\Database;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

class Workspace
{
    const TABLE = "workspace";

    static function boot(){
    	if (!Schema::hasTable('users'))
		{
		    Schema::create('users', function($table)
			{
			    $table->increments('id')->unique();
			    $table->string('name', 60)->unique();
			    $table->integer('assigned_to');
			    $table->integer('created_by')->nullable();
			});
		}
    }
}