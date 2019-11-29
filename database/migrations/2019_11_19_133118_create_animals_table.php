<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('father_id')->nullable();
            $table->unsignedBigInteger('mother_id')->nullable();

            $table->integer('id_number')->unique();
            $table->integer('identification_number')->unique();   //maticni_broj
            $table->string('hb')->unique();
            $table->string('rb')->unique();
            $table->date('birth_day');
            $table->unsignedBigInteger('breed_id');
            $table->boolean('gender');  // true - musko / false - zensko
            $table->unsignedBigInteger('user_id');  //Odgajivac
            $table->unsignedBigInteger('owner_id');
            $table->date('exclusion_date');
            $table->string('exclusion_reason');
            $table->integer('days_in_first_mating');
            $table->integer('left_tits');
            $table->integer('right_tits');
            $table->string('selection_mark')->unique(); //selekcijska markica
            $table->integer('registration_number')->unique(); //registarski broj grla
            $table->integer('tattoo_number')->unique();
            $table->string('birth_type');   //tip rodjenja
            $table->timestamps();

            $table->foreign('owner_id')->references('id')
                ->on('owners')->onDelete('cascade');


            $table->foreign('breed_id')->references('id')
                ->on('breeds')->onDelete('cascade');


        });
    }   //TODO(1) Too much unique fields?

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
