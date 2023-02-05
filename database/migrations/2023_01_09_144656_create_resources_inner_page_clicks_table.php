<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesInnerPageClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources_inner_page_clicks', function (Blueprint $table) {
            $table->id();
            $table->integer('count')->nullable();
            $table->unsignedBigInteger('inner')->nullable();
            $table->foreign('inner')->on('resources_inner_pages')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('resources_inner_page_clicks');
    }
}
