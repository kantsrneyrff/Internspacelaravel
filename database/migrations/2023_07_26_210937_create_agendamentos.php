<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->date('dt');
         
            $table->enum('periodo', ['M', 'T', 'I']);

            $table->enum('status', ['A', 'I']);

            //FK Chaves
            $table->unsignedBigInteger('hotels_id');
            $table->foreign('hotels_id')->references('id')->on('hoteis');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('setors_id');
            $table->foreign('setors_id')->references('id')->on('setores');
          
            
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
        Schema::dropIfExists('agendamentos');
    }
};
