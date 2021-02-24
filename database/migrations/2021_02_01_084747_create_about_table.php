<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dedicated_team_member')->nullable();
            $table->integer('projects_completed')->nullable();
            $table->integer('regular_users')->nullable();
            $table->integer('awards')->nullable();
            $table->string('title1')->nullable();
            $table->string('short_description1')->nullable();
            $table->text('description1')->nullable();
            $table->string('title2')->nullable();
            $table->string('short_description2')->nullable();
            $table->text('description2')->nullable();
            $table->string('title3')->nullable();
            $table->string('short_description3')->nullable();
            $table->text('description3')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('publish')->nullable();
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
        Schema::dropIfExists('about');
    }
}
