<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyDesignAppSectionFourteenCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_design_app_section_fourteen_cards', function (Blueprint $table) {
            $table->id();
            $table->string('pointEn')->nullable();
            $table->string('pointAr')->nullable();

            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('body_design_app_section_fourteens')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('body_design_app_section_fourteen_cards');
    }
}
