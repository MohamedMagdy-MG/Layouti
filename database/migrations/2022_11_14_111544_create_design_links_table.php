<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_links', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->text('topLeftImage')->nullable();
            $table->text('topRightImage')->nullable();
            $table->text('bottomLeftImage')->nullable();
            $table->text('bottomRightImage')->nullable();
            $table->string('linksTitleEn')->nullable();
            $table->string('linksTitleAr')->nullable();
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
        Schema::dropIfExists('design_links');
    }
}
