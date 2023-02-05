<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvDesignEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_design_education', function (Blueprint $table) {
            $table->id();
            $table->string('majorEn')->nullable();
            $table->string('majorAr')->nullable();
            $table->string('universityEn')->nullable();
            $table->string('universityAr')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('cv_design_education');
    }
}
