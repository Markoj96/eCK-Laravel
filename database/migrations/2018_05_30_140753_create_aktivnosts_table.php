<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivnostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivnosts', function (Blueprint $table) {
           $table->increments('id');
           $table->string('naziv');
           $table->string('tip');
           $table->string('mesto');
           $table->mediumText('opis');
           $table->date('datumOd');
           $table->date('datumDo');
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
        Schema::dropIfExists('aktivnosts');
    }
}
