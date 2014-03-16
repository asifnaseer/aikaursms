<?php

use Illuminate\Database\Migrations\Migration;

class AldiVideo extends Migration {

	protected static $table = 'aldi_video';


        /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(AldiVideo::$table, function($table)
		{
			$table  ->  increments('id');
			$table  ->  string('name');
			$table  ->  text('description');
                        $table  ->  string('url');
                                               
                        $table  ->  string('notes');
			$table  ->  string('tags');
                        
			$table  ->  timestamps();
                        $table  ->  softDeletes();

			$table  ->  engine = 'MyISAM';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop(AldiVideo::$table);
	}

}