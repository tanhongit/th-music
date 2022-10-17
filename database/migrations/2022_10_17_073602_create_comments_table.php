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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_comment_id')->nullable()->comment('Parent comment id');
            $table->foreign('parent_comment_id')->references('id')->on('comments');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('content');
            $table->integer('status')->default(0)->comment('0: pending, 1: approved, 2: rejected');
            $table->unsignedBigInteger('post_id')->index()->nullable()->comment('Post id');
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::dropIfExists('comments');
    }
};
