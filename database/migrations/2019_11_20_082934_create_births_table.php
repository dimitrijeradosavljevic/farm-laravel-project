<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('births', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('animal_id');
            $table->date('date');
            $table->integer('birth_number');
            $table->integer('males');
            $table->integer('females');
            $table->integer('passed');
            $table->integer('mummified');
            $table->string('birth_certificate');//bitch_certificate?
            $table->timestamps();

            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('births');
    }
}
