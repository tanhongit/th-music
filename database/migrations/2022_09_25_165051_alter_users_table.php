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
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
            $table->string('phone', 255)->nullable()->after('password');
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER'])->nullable()->after('password');
            $table->date('birth_date')->nullable()->after('password');
            $table->text('avatar')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('birth_date');
            $table->dropColumn('avatar');
        });
    }
};
