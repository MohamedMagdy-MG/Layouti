<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvatarsFemaleNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatars_female_names', function (Blueprint $table) {
            $table->id();
            $table->string('fnameEn')->nullable();
            $table->string('lnameEn')->nullable();
            $table->string('fnameAr')->nullable();
            $table->string('lnameAr')->nullable();
            $table->string('gender')->default('female');
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
        Schema::dropIfExists('avatars_female_names');
    }
}
