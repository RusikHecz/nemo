<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
	        $table->id();
	        $table->string('iata_code')->unique();
	        $table->string('city_name_ru')->nullable();
	        $table->string('city_name_en')->nullable();
	        $table->string('airport_name_ru')->nullable();
	        $table->string('airport_name_en')->nullable();
	        $table->string('area')->nullable();
	        $table->string('country')->nullable();
	        $table->string('latitude')->nullable();
	        $table->string('longitude')->nullable();
	        $table->string('timezone');
	        $table->timestamps();
	        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airports');
    }
}
