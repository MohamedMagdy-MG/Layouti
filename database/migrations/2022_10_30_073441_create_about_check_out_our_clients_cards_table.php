<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCheckOutOurClientsCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_check_out_our_clients_cards', function (Blueprint $table) {
            $table->id();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->string('industryEn')->nullable();
            $table->string('industryAr')->nullable();
            $table->text('image')->nullable();
            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('about_check_out_our_clients')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('about_check_out_our_clients_cards');
    }
}