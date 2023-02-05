<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageHeaderContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_header_contents', function (Blueprint $table) {
            $table->id();
            $table->string('color')->nullable();
            $table->string('titleOneEn')->nullable();
            $table->string('titleOneAr')->nullable();
            $table->string('titleTwoEn')->nullable();
            $table->string('titleTwoAr')->nullable();
            $table->string('titleThreeEn')->nullable();
            $table->string('titleThreeAr')->nullable();
            $table->string('availabilityTitleEn')->nullable();
            $table->string('availabilityTitleAr')->nullable();
            $table->text('availabilityIOSIcon')->nullable();
            $table->string('availabilityIOSLink')->nullable();
            $table->text('availabilityAndroidIcon')->nullable();
            $table->string('availabilityAndroidLink')->nullable();
            $table->text('topLeftImage')->nullable();
            $table->text('topRightImage')->nullable();
            $table->text('bottomLeftImage')->nullable();
            $table->text('bottomRightImage')->nullable();
            $table->text('bottomImage')->nullable();
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
        Schema::dropIfExists('home_page_header_contents');
    }
}
