<?php

use Illuminate\Database\Migrations\Migration;

class PhysicalAddress extends Migration {

        protected static $table = 'gen_physical_address';


        /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(PhysicalAddress::$table, function($table)
		{
			$table  ->  increments('id');
			$table  ->  string('line1');
			$table  ->  string('line2');
                        $table  ->  string('line3');
			$table  ->  string('line4');
                        $table  ->  string('line5');
			$table  ->  string('city',25);
			$table  ->  string('state',25);
                        $table  ->  string('state_code',3);
			$table  ->  string('country',25);
			$table  ->  string('country_code',3);
                        $table  ->  string('country_sub_division_code',3);
			$table  ->  string('postal_code',25);
			$table  ->  string('postal_code_suffix',25);
                        $table  ->  string('lat',50);
			$table  ->  string('long',50);
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
		Schema::drop(PhysicalAddress::$table);
	}

}