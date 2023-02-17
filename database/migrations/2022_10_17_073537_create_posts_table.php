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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('Title');
            $table->string('slug', 255)->comment('Slug - URL');
            $table->text('content')->comment('Content');
            $table->integer('image_id')->comment('Image ID')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->comment('User ID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('category_id')->nullable()->comment('Category ID');
            $table->unsignedBigInteger('tag_id')->nullable()->comment('Tag ID');
            $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING', 'TRASH', 'PRIVATE', 'SCHEDULED', 'REVIEW', 'ARCHIVE'])->default('DRAFT')->comment('Status');
            $table->integer('type')->default(0)->comment('Type');
            $table->infoCommonFields();
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
        Schema::dropIfExists('posts');
    }
};
