<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObukasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obukas', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('idObucenost')->unsigned();
           $table->foreign('idObucenost')->references('id')->on('obucenosts');
           $table->date('datumOdrzavanja');
           $table->string('mesto');
           $table->integer('brojUcesnika');
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
        Schema::dropIfExists('obukas');
    }
}
