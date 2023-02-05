<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnUIHighlitsDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_u_i_highlits_designs', function (Blueprint $table) {
            $table->id();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->string('subTitleEn')->nullable();
            $table->string('subTitleAr')->nullable();
            $table->text('highlits')->nullable();
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
        Schema::dropIfExists('learn_u_i_highlits_designs');
    }
}
