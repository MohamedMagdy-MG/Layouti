<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnUIHeaderContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_u_i_header_contents', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('titleEn')->nullable();
            $table->string('titleAr')->nullable();
            $table->string('subTitleEn')->nullable();
            $table->string('subTitleAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->string('createByEn')->nullable();
            $table->string('createdByAr')->nullable();
            $table->text('iconOfCreated')->nullable();
            $table->string('createdInEn')->nullable();
            $table->string('createdInAr')->nullable();
            $table->text('iconInCreated')->nullable();
            $table->string('speakerEn')->nullable();
            $table->string('speakerAr')->nullable();
            $table->text('iconOfSpeaker')->nullable();
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
        Schema::dropIfExists('learn_u_i_header_contents');
    }
}
