<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsAndConditionsPagePointsPolicyCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms_and_conditions_page_points_policy_cards', function (Blueprint $table) {
            $table->id();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->unsignedBigInteger('card')->nullable();
            $table->foreign('card')->on('terms_and_conditions_page_points_policies')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('terms_and_conditions_page_points_policy_cards');
    }
}
