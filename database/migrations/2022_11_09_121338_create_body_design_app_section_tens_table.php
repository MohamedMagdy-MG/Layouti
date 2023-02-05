<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyDesignAppSectionTensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_design_app_section_tens', function (Blueprint $table) {
            $table->id();

            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->text('image')->nullable();

            $table->unsignedBigInteger('body')->nullable();
            $table->foreign('body')->on('body_design_app_section_ones')->references('id')->onDelete('CASCADE');
            $table->unsignedBigInteger('project')->nullable();
            $table->foreign('project')->on('product_general_information')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('body_design_app_section_tens');
    }
}
