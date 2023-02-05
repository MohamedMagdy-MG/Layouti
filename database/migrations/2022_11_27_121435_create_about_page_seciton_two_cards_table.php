<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutPageSecitonTwoCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_page_seciton_two_cards', function (Blueprint $table) {
            $table->id();
            $table->text('icon')->nullable();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();

            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('about_page_seciton_twos')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('about_page_seciton_two_cards');
    }
}
