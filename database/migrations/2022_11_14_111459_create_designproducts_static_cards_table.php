<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignproductsStaticCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designproducts_static_cards', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->text('slide')->nullable();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->string('subTitleEn')->nullable();
            $table->string('subTitleAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->text('reviewLink')->nullable();
            $table->text('downloadLink')->nullable();

            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('designproducts_statics')->references('id')->onDelete('CASCADE');

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
        Schema::dropIfExists('designproducts_static_cards');
    }
}
