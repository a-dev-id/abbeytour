<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('website_title')->nullable();
            $table->text('website_description')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('about_us')->nullable();
            $table->text('about_us_description')->nullable();
            $table->string('why_choose_us')->nullable();
            $table->text('why_choose_us_description')->nullable();
            $table->string('popular_destination')->nullable();
            $table->text('popular_destination_description')->nullable();
            $table->string('latest_news')->nullable();
            $table->text('latest_news_description')->nullable();
            $table->string('testimonial')->nullable();
            $table->text('testimonial_description')->nullable();
            $table->string('our_client')->nullable();
            $table->text('our_client_description')->nullable();
            $table->string('gallery')->nullable();
            $table->text('gallery_description')->nullable();
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
};
