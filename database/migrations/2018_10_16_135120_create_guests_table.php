<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('reservation_id');
            $table->foreign('reservation_id')->references('reservations')->on('id')->onDelete('CASCADE');
            $table->unsignedBigInteger('guest_id');
            $table->foreign('guest_id')->references('users')->on('id')->onDelete('CASCADE');

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
        Schema::dropIfExists('guests');
    }
}
