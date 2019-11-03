<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BannerSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_setting', function (Blueprint $table) {
            $table->integer('banner_id')->default(1)->unsigned();
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
            $table->integer('setting_id')->default(1)->unsigned();
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
