<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTeamCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_team_cards', function (Blueprint $table) {
            $table->id();
            $table->string('nameEn')->nullable();
            $table->string('nameAr')->nullable();
            $table->text('jobTitleEn')->nullable();
            $table->text('jobTitleAr')->nullable();
            $table->text('image')->nullable();
            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('about_teams')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('about_team_cards');
    }
}
