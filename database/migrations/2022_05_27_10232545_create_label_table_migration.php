<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// migration not recreate when change eloquent timestamp property
class createLabelTableMigration extends Migration{

public function up(){

	Schema::create('labels',function(Blueprint $table){
		$table->increments('id');
		$table->string('name')->unique();
		$table->unsignedBigInteger('task_id')->nullable();
	});
}

public function down(){
	Schema::dropIfExists('labels');
}

}
