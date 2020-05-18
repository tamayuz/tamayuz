<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_src')->default('/images/Davatar.jpg');
            $table->string('video_src')->nullable();
            $table->string('video_link')->nullable();
            $table->string('powerpoint_src')->nullable();
            $table->string('university');
            $table->string('description');
            $table->string('sub_category');
            $table->string('supervisor_name')->nullable();
            $table->integer('grade')->nullable();
            $table->boolean('is_accepted')->default(false);

            $table->unsignedBigInteger('byHow')->nullable();
            $table->unsignedBigInteger('study_major_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('season_id');

            $table->foreign('study_major_id')->references('id')->on('study_majors');
            $table->foreign('user_id')->references('id')->on('Users');
            $table->foreign('byHow')->references('id')->on('Users');
            $table->foreign('season_id')->references('id')->on('Seasons');

            $table->timestamps();


        });
        Schema::table('seasons', function (Blueprint $table) {
            $table->unsignedBigInteger('best_project_ID')->nullable();
            $table->foreign('best_project_ID')->references('id')->on('Projects')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
