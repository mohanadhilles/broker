<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fb')->nullable();
            $table->string('tw')->nullable();
            $table->string('ln')->nullable();
            $table->string('yt')->nullable();
            $table->string('in')->nullable();
            $table->string('title')->nullable();
            $table->text('Content')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('best_title')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            $table->integer('country_id')->default(1)->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->integer('lang_id')->default(1)->unsigned();
            $table->foreign('lang_id')->references('id')->on('lang')->onDelete('cascade');

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
        Schema::dropIfExists('settings');
    }
}
