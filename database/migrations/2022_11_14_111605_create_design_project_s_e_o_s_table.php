<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignProjectSEOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_project_s_e_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('focusKeypharseEn')->nullable();
            $table->string('focusKeypharseAr')->nullable();

            $table->string('seoTitleEn')->nullable();
            $table->string('seoTitleAr')->nullable();

            $table->string('slugEn')->nullable();
            $table->string('slugAr')->nullable();

            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();

            $table->text('facebookImage')->nullable();
            $table->string('facebookTitleEn')->nullable();
            $table->string('facebookTitleAr')->nullable();
            $table->text('facebookDescriptionEn')->nullable();
            $table->text('facebookDescriptionAr')->nullable();




            $table->unsignedBigInteger('project')->nullable();
            $table->foreign('project')->on('design_projects')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('design_project_s_e_o_s');
    }
}
