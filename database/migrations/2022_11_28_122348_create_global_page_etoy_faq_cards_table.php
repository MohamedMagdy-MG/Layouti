<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalPageEtoyFaqCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_page_etoy_faq_cards', function (Blueprint $table) {
            $table->id();
            $table->string('questionEn')->nullable();
            $table->string('questionAr')->nullable();
            $table->text('answerEn')->nullable();
            $table->text('answerAr')->nullable();
            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('global_page_etoy_faqs')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('global_page_etoy_faq_cards');
    }
}
