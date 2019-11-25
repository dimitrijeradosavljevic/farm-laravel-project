<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('male_id');
            $table->unsignedBigInteger('female_id');
            $table->unsignedBigInteger('birth_id')->nullable();
            $table->timestamps();

//            $table->foreign('male_id')->references('id')->on('animals');
//            $table->foreign('female_id')->references('id')->on('animals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matings');
    }
}
