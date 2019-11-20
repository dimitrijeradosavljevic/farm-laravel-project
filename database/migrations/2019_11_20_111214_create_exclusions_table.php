<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExclusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclusions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedInteger('days_old');
            $table->unsignedInteger('animals_count');
            $table->double('litter_weight');    //masa legla
            $table->double('litter_mark');  //ocena legla
            $table->double('mother_mark');  //ocena krmace
            $table->unsignedInteger('males_for_breeding');  //odabrano za priplod muskih
            $table->unsignedInteger('females_for_breeding');
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
        Schema::dropIfExists('exclusions');
    }
}
