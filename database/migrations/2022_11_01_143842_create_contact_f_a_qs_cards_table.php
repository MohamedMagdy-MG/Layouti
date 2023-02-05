<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFAQsCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_f_a_qs_cards', function (Blueprint $table) {
            $table->id();
            $table->string('questionEn')->nullable();
            $table->string('questionAr')->nullable();
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->on('layouti_categories_faqs')->references('id')->onDelete('CASCADE');
            $table->text('answerEn')->nullable();
            $table->text('answerAr')->nullable();
            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('contact_f_a_qs')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('contact_f_a_qs_cards');
    }
}
