<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutiContactUsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouti_contact_us_pages', function (Blueprint $table) {
            $table->id();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->text('keywordsEn')->nullable();
            $table->text('keywordsAr')->nullable();
            $table->text('slugEn')->nullable();
            $table->text('slugAr')->nullable();
            $table->text('image')->nullable();
            $table->text('facebookImage')->nullable();
            $table->string('facebookTitleEn')->nullable();
            $table->string('facebookTitleAr')->nullable();
            $table->text('facebookDescriptionEn')->nullable();
            $table->text('facebookDescriptionAr')->nullable();
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
        Schema::dropIfExists('layouti_contact_us_pages');
    }
}
