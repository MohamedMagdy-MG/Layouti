<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageSecitonFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_seciton_fours', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->text('qouteEn')->nullable();
            $table->text('qouteAr')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('nameAr')->nullable();
            $table->string('jopTitleEn')->nullable();
            $table->string('jopTitleAr')->nullable();
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
        Schema::dropIfExists('home_page_seciton_fours');
    }
}
