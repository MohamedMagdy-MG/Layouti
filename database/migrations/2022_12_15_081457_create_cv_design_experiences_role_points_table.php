<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvDesignExperiencesRolePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_design_experiences_role_points', function (Blueprint $table) {
            $table->id();
            $table->text('pointEn')->nullable();
            $table->text('pointAr')->nullable();
            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('cv_design_experiences_roles')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('cv_design_experiences_role_points');
    }
}
