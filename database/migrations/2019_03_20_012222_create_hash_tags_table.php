<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //hash_tagsというテーブルを作成するメソッド
        Schema::create('hash_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        /** tweetテーブルとhash_tagsテーブルを繋ぐ中間テーブルを作成するメソッド
         * 両テーブルのIDカラムのみ持たせる
        */
        Schema::create('hash_tag_tweet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hash_tag_id')->unsigned();
            $table->integer('tweet_id')->unsigned();
            $table->timestamps();

            $table->foreign('tweet_id')->references('id')->on('tweets');
            $table->foreign('hash_tag_id')->references('id')->on('hash_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hash_tags');
        Schema::dropIfExists('hash_tag_tweet');
    }
}
