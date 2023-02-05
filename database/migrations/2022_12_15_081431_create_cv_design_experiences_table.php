<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvDesignExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_design_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('positionTitleEn')->nullable();
            $table->string('positionTitleAr')->nullable();
            $table->string('positionType')->nullable();
            $table->string('companyNameEn')->nullable();
            $table->string('companyNameAr')->nullable();
            $table->unsignedBigInteger('companyCountry')->nullable();
            $table->foreign('companyCountry')->on('countries')->references('id')->onDelete('CASCADE');
            $table->string('workDate')->nullable();
            $table->date('startWorkDate')->nullable();
            $table->date('endWorkDate')->nullable();
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
        Schema::dropIfExists('cv_design_experiences');
    }
}
