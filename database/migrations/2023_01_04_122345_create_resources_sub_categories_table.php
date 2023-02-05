<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('nameAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->on('resources_categories')->references('id')->onDelete('CASCADE');
            $table->integer('order')->default(1);
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
        Schema::dropIfExists('resources_sub_categories');
    }
}
