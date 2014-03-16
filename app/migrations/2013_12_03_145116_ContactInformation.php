<?php

use Illuminate\Database\Migrations\Migration;

class ContactInformation extends Migration {

	protected static $table = 'gen_contact_information';


        /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(ContactInformation::$table, function($table)
		{
			$table  ->  increments('id');
			$table  ->  string('telephone');
			$table  ->  string('mobile');
                        $table  ->  string('email');
			$table  ->  string('website');
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
		Schema::drop(ContactInformation::$table);
	}

}