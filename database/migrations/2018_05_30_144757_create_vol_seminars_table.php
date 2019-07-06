<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vol_seminars', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('idSeminar')->unsigned();
           $table->foreign('idSeminar')->references('id')->on('seminars');
           $table->integer('idVolonter')->unsigned();
           $table->foreign('idVolonter')->references('id')->on('users');
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
        Schema::dropIfExists('vol_seminars');
    }
}
