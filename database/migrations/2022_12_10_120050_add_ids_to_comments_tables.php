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
        Schema::table('comments_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('content');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('tweet_id')->nullable()->after('content');
            $table->foreign('tweet_id')->references('id')->on('tweets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments_tables', function (Blueprint $table) {
            $table->dropForeign(['user_id','tweet_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('tweet_id');
        });
    }
};
