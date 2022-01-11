<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SensorData', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('deviceid');
            $table->string('custid');
            $table->string('temp');
            $table->string('humidity');
            $table->string('localip');
            $table->timestamp('reading_time');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SensorData');
    }
}
