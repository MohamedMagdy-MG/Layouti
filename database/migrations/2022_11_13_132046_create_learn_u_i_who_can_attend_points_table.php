<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnUIWhoCanAttendPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_u_i_who_can_attend_points', function (Blueprint $table) {
            $table->id();
            $table->text('pointEn')->nullable();
            $table->text('pointAr')->nullable();

            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('learn_u_i_who_can_attends')->references('id')->onDelete('CASCADE');

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
        Schema::dropIfExists('learn_u_i_who_can_attend_points');
    }
}
