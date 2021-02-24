<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('pininterest')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('cell')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('address1')->nullable();
            $table->string('home_banner_image')->nullable();
            $table->string('about_us_banner_image')->nullable();
            $table->string('contact_banner_image')->nullable();
            $table->string('products_banner_image')->nullable();
            $table->string('projects_banner_image')->nullable();
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->text('office_map')->nullable();
            $table->text('video')->nullable();
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
