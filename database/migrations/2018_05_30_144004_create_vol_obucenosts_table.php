<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolObucenostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vol_obucenosts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idVolonter')->unsigned();
            $table->foreign('idVolonter')->references('id')->on('users');
            $table->integer('idObucenost')->unsigned();
            $table->foreign('idObucenost')->references('id')->on('obucenosts');
            $table->integer('godina');
            $table->mediumText('opis');
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
        Schema::dropIfExists('vol_obucenosts');
    }
}
