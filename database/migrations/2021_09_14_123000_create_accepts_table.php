<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepts', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(0);
            $table->string('code')->nullable();


            $table->integer('job_id')->nullable()->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

            $table->integer('employer_id')->nullable()->unsigned();
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('message_id')->nullable()->unsigned();
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');

            $table->integer('subscription_id')->nullable()->unsigned();
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

            $table->integer('track_id')->nullable()->unsigned();
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');

            $table->integer('worker_id')->unsigned();
            $table->foreign('worker_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('tracks', function (Blueprint $table) {

            $table->integer('accept_id')->unsigned()->unique();
            $table->foreign('accept_id')->references('id')->on('accepts')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accepts');
    }
}
