<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           $table->increments('id');
           $table->string('ime');
           $table->string('email')->unique();
           $table->string('password');
           $table->string('prezime');
           $table->enum('pol',array('M','Z'));
           $table->string('prebivaliste');
           $table->string('zanimanje')->nullable();
           $table->string('slika')->nullable();     
           $table->enum('pravaPristupa',array('V','A','M'));
           $table->date('datumRodjenja');
           $table->date('datumPristupa')->nullable();
           $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
