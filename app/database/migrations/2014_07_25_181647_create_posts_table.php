<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table) {
			$table->increments('id');
		    $table->string('title', 40);
		    $table->text('body');
		    $table->string('m_keyw')->unique();
		    $table->string('description');
		    $table->string('slug');
		   	$table->boolean('is_active');
		    $table->timestamps();
		    $table->integer('user_id')->unsigned();
		});

		Schema::table('posts', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
