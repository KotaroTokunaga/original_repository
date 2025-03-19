<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class Pastes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //以下追加

        Schema::create('pastes', function (Blueprint $table){

            $table->id();// 自動増分のidカラム

            $table->string('user_name')->after('id'); // 'id'の後にuser_nameカラムを追加

            $table->text('contents');

            $table->timestamps(); // created_at, updated_atカラムを自動で作成

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('pastes'); // pastesテーブルを削除
}

}
