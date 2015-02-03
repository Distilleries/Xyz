<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('profile_id');
			$table->string('road');
			$table->integer('city_id');
			$table->integer('country_id');
			$table->float('lat');
			$table->float('lng');
			$table->timestamps();
            $table->softDeletes();


            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adresses');
	}

}
