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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string('name' ,255)->nullable();
            $table->string('path' ,255)->comment('The path to the file');
            $table->string('extension' ,255)->nullable()->comment('jpg, png, mp4, mp3, ...');
            $table->integer('priority')->default(0);
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->enum('type', ['IMAGE', 'VIDEO', 'AUDIO', 'FILE'])->default('IMAGE');
            $table->string('mime_type' ,255)->nullable();
            $table->string('width' ,255)->nullable()->comment('The width of the image');
            $table->string('height' ,255)->nullable()->comment('The height of the image');
            $table->string('alt' ,255)->nullable()->comment('The alt of the image');
            $table->string('caption' ,255)->nullable()->comment('The caption of the image');
            $table->string('thumbnail' ,255)->nullable()->comment('The thumbnail of the image');
            $table->string('duration' ,255)->nullable()->comment('The duration of the video');
            $table->string('framerate' ,255)->nullable()->comment('The framerate of the video');
            $table->string('sample_rate' ,255)->nullable()->comment('The sample rate of the audio');
            $table->string('channels' ,255)->nullable()->comment('The channels of the audio');
            $table->string('bitrate' ,255)->nullable()->comment('The bitrate of the audio');
            $table->string('size' ,255)->nullable()->comment('The size of the file');
            $table->string('title' ,255)->nullable();
            $table->string('description' ,255)->nullable();
            $table->integer('downloadable')->default(0)->comment('0: No, 1: Yes');
            $table->unsignedBigInteger('post_id')->nullable()->default(0);
            $table->commonFields();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias');
    }
};
