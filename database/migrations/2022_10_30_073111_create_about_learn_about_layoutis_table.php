<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutLearnAboutLayoutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_learn_about_layoutis', function (Blueprint $table) {
            $table->id();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->text('leftImage')->nullable();
            $table->text('rightImage')->nullable();
            $table->text('otherDescriptionEn')->nullable();
            $table->text('otherDescriptionAr')->nullable();
            $table->text('otherLeftImage')->nullable();
            $table->text('otherRightImage')->nullable();
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
        Schema::dropIfExists('about_learn_about_layoutis');
    }
}
