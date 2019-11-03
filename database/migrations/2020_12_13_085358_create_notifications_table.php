<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();

            $table->integer('job_type_id')->default(1)->unsigned();
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');

            $table->integer('job_id')->default(1)->unsigned()->nullable();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

            $table->integer('user')->default(1)->unsigned();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');

            $table->integer('country_id')->default(1)->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

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
        Schema::dropIfExists('notifications');
    }
}
