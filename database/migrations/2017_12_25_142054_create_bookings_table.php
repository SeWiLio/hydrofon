<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('object_id')->unsigned()->index();
            $table->integer('created_by_id')->unsigned()->nullable();
            $table->dateTime('start_time')->index();
            $table->dateTime('end_time')->index();
            $table->timestamps();

            // Delete booking if user is deleted.
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade');

            // Delete booking if object is deleted.
            $table->foreign('object_id')->references('id')->on('objects')
                  ->onDelete('cascade');

            // Set creator to NULL if creating user is deleted.
            $table->foreign('created_by_id')->references('id')->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
