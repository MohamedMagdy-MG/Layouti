<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_projects', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('nameAr')->nullable();
            $table->string('ceatedByEn')->nullable();
            $table->string('ceatedByAr')->nullable();
            $table->string('availabilityProgramsEn')->nullable();
            $table->string('availabilityProgramsAr')->nullable();
            $table->text('smallDescriptionEn')->nullable();
            $table->text('smallDescriptionAr')->nullable();
            $table->date('date')->nullable();
            $table->string('state')->nullable();
            $table->double('price')->nullable();
            $table->text('link')->nullable();

            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->on('design_categories')->references('id')->onDelete('CASCADE');
            $table->text('informationEn')->nullable();
            $table->text('informationAr')->nullable();
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
        Schema::dropIfExists('design_projects');
    }
}
