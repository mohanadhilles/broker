<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('wanted_at')->nullable();
            $table->float('salary')->nullable();
            $table->integer('place_size')->nullable();
            $table->integer('bed_rooms')->nullable();
            $table->integer('child_no')->nullable();
            $table->boolean('active')->nullable()->index()->default(0);
            $table->boolean('status')->nullable()->index()->default(0);
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('code')->nullable();
            $table->text('description')->nullable();

            $table->integer('job_type')->default(1)->unsigned();
            $table->foreign('job_type')->references('id')->on('job_types')->onDelete('cascade');

            $table->integer('contract')->default(1)->unsigned();
            $table->foreign('contract')->references('id')->on('contracts')->onDelete('cascade');

            $table->integer('country')->default(1)->unsigned();
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');

            $table->integer('place')->default(1)->unsigned();
            $table->foreign('place')->references('id')->on('places')->onDelete('cascade');


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
        Schema::dropIfExists('jobs');
    }
}
