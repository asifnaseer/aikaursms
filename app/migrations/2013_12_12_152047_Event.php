<?php

use Illuminate\Database\Migrations\Migration;

class Event extends Migration {

	protected static $table = 'aldi_event';


        /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(Event::$table, function($table)
		{
			$table  ->  increments('id');
			$table  ->  string('name');
			$table  ->  text('description');
                        $table  ->  string('banner_image');
                        
			$table  ->  date('start_date');
                        $table  ->  date('end_date');
                        
                        $table  ->  integer('location');
                        
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
		Schema::drop(Event::$table);
	}

}