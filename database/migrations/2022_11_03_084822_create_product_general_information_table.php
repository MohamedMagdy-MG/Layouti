<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGeneralInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_general_information', function (Blueprint $table) {
            $table->id();
            $table->integer('template')->nullable();
            $table->string('launch')->nullable();
            $table->text('image')->nullable();
            $table->text('thumbnailImage')->nullable();
            $table->string('color')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('product_general_information');
    }
}
