<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('room_id');
            $table->integer('status_id');
            $table->integer('service_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('prepayment')->default(0);
            $table->integer('adults')->default(0);
            $table->integer('children')->default(0);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
