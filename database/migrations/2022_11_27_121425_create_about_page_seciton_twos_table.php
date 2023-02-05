<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutPageSecitonTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_page_seciton_twos', function (Blueprint $table) {
            $table->id();
            $table->string('titleOneEn')->nullable();
            $table->string('titleOneAr')->nullable();
            $table->string('titleTwoEn')->nullable();
            $table->string('titleTwoAr')->nullable();
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
        Schema::dropIfExists('about_page_seciton_twos');
    }
}
