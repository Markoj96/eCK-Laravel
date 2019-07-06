<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUcescesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ucesces', function (Blueprint $table) {
            $table->increments('id');
            #$table->date('datumOdrzavanja');
            $table->boolean('status');
            $table->integer('idAktivnost')->unsigned();
            $table->foreign('idAktivnost')->references('id')->on('aktivnosts');
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
        Schema::dropIfExists('ucesces');
    }
}
