<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalPageEtoyAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_page_etoy_app_settings', function (Blueprint $table) {
            $table->id();
            $table->text('favIcon')->nullable();
            $table->text('lightLogo')->nullable();
            $table->text('darkLogo')->nullable();
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
        Schema::dropIfExists('global_page_etoy_app_settings');
    }
}
