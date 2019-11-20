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
            $table->bigInteger('animal_id');
            $table->date('date');
            $table->integer('birth_number');
            $table->integer('males');
            $table->integer('females');
            $table->integer('passed');
            $table->integer('mummified');
            $table->string('bitch_certificate');
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
        Schema::dropIfExists('births');
    }
}
