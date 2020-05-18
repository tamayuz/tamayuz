<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_major_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('image_src')->default('/images/Davatar.jpg');
            $table->string('title');
            $table->string('description');
            $table->text('body');
            $table->boolean('is_accepted')->default(0);
            $table->unsignedBigInteger('byHow')->nullable();
            $table->timestamps();
            $table->foreign('study_major_id')->references('id')->on('study_majors');
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade');
            $table->foreign('byHow')->references('id')->on('Users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
