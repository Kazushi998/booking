<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phoneNo');
            $table->string('title');
            $table->string('vip')->nullable();
            $table->string('room');
            $table->string('date');
            $table->string('startTime');
            $table->string('endTime');
            $table->string('status');
            $table->string('dateSubmit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
