<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnUIQuestionsCollapsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_u_i_questions_collapses', function (Blueprint $table) {
            $table->id();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->string('subTitleEn')->nullable();
            $table->string('subTitleAr')->nullable();
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
        Schema::dropIfExists('learn_u_i_questions_collapses');
    }
}
