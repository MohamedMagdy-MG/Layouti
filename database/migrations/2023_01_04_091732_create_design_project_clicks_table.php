<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignProjectClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_project_clicks', function (Blueprint $table) {
            $table->id();
            $table->integer('count')->nullable();
            $table->unsignedBigInteger('project')->nullable();
            $table->foreign('project')->on('design_projects')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('design_project_clicks');
    }
}
