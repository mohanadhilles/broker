<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('brand')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('photo')->nullable();
            $table->string('cv')->nullable();
            $table->date('available_at')->nullable();
            $table->integer('age')->nullable();
            $table->date('date_join_training_center')->nullable();
            $table->float('salary')->nullable();
            $table->string('facebook')->nullable();
            $table->string('passport')->nullable();
            $table->date('passport_date_of_issue')->nullable();
            $table->date('passport_date_of_exp')->nullable();
            $table->date('exp_visa')->nullable();
            $table->integer('no_of_child')->nullable();
            $table->integer('height')->unsigned()->nullable();
            $table->integer('weight')->unsigned()->nullable();
            $table->integer('gender')->nullable();
            $table->boolean('active')->index()->default(0);
            $table->boolean('status')->index()->default(0);
            $table->text('bio')->nullable();
            $table->string('code')->nullable();
            $table->integer('rank')->nullable();

            $table->string('youtube')->nullable();
            $table->string('whats_app')->nullable();
            $table->integer('experience')->nullable();
            $table->string('worked_in')->nullable();
            $table->string('address')->nullable();
            $table->string('entry_by')->nullable();
            $table->double('social_id')->nullable();

            $table->integer('role')->nullable()->unsigned();
            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');


            $table->integer('track_id')->nullable()->unsigned();
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');


            $table->unsignedBigInteger('provider_id')->nullable()->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

            $table->integer('place_of_birth')->default(1)->unsigned();
            $table->foreign('place_of_birth')->references('id')->on('countries')->onDelete('cascade');

            $table->integer('contract')->default(1)->unsigned();
            $table->foreign('contract')->references('id')->on('contracts')->onDelete('cascade');

            $table->integer('job_type')->default(1)->unsigned();
            $table->foreign('job_type')->references('id')->on('job_types')->onDelete('cascade');

            $table->integer('nationality')->default(1)->unsigned();
            $table->foreign('nationality')->references('id')->on('countries')->onDelete('cascade');


            $table->integer('english_lang')->default(1)->unsigned();
            $table->foreign('english_lang')->references('id')->on('languages')->onDelete('cascade');

            $table->integer('arabic_lang')->default(1)->unsigned();
            $table->foreign('arabic_lang')->references('id')->on('languages')->onDelete('cascade');

            $table->integer('mandarin_lang')->default(1)->unsigned();
            $table->foreign('mandarin_lang')->references('id')->on('languages')->onDelete('cascade');

            $table->string('marital_status')->default(1);

            $table->integer('place')->default(1)->unsigned();
            $table->foreign('place')->references('id')->on('places')->onDelete('cascade');

            $table->integer('education')->default(1)->unsigned();
            $table->foreign('education')->references('id')->on('education')->onDelete('cascade');

            $table->integer('currency')->default(1)->unsigned();
            $table->foreign('currency')->references('id')->on('currencies')->onDelete('cascade');

            $table->integer('religion')->default(1)->unsigned();
            $table->foreign('religion')->references('id')->on('religions')->onDelete('cascade');

            $table->integer('country')->default(1)->unsigned();
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');

            $table->integer('city')->nullable()->unsigned();
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('completion')->default(1)->unsigned();
            $table->foreign('completion')->references('id')->on('completions')->onDelete('cascade');


            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('jobs', function (Blueprint $table) {

            $table->integer('employer')->default(1)->unsigned()->nullable();
            $table->foreign('employer')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('tracks', function (Blueprint $table) {

            $table->integer('user_id')->default(1)->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('tracks', function (Blueprint $table) {

            $table->integer('helper_id')->default(1)->unsigned()->unique();
            $table->foreign('helper_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');


    }
}
