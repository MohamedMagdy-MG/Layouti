<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnUIStepsReachCardsOfCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_u_i_steps_reach_cards_of_cards', function (Blueprint $table) {
            $table->id();
            $table->text('icon')->nullable();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();

            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('learn_u_i_steps_reach_cards')->references('id')->onDelete('CASCADE');

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
        Schema::dropIfExists('learn_u_i_steps_reach_cards_of_cards');
    }
}
