<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesInnerPageCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources_inner_page_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->on('resources_categories')->references('id')->onDelete('CASCADE');
            $table->unsignedBigInteger('subCategory')->nullable();
            $table->foreign('subCategory')->on('resources_sub_categories')->references('id')->onDelete('CASCADE');
            $table->unsignedBigInteger('page')->nullable();
            $table->foreign('page')->on('resources_inner_pages')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('resources_inner_page_categories');
    }
}
