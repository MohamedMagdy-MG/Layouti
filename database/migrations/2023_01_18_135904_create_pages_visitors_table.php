<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_visitors', function (Blueprint $table) {
            $table->id();
            $table->integer('count')->default(0);
            $table->unsignedBigInteger('country')->nullable();
            $table->foreign('country')->on('countries')->references('id')->onDelete('CASCADE');
            $table->unsignedBigInteger('page')->nullable();
            $table->foreign('page')->on('pages')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('pages_visitors');
    }
}
