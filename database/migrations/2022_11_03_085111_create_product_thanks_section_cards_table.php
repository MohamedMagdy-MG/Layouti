<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductThanksSectionCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_thanks_section_cards', function (Blueprint $table) {
            $table->id();
            $table->string('labelEn')->nullable();
            $table->string('labelAr')->nullable();
            $table->string('textEn')->nullable();
            $table->string('textAr')->nullable();

            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('product_thanks_sections')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('product_thanks_section_cards');
    }
}
