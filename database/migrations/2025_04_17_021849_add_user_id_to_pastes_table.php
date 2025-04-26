<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pastes', function (Blueprint $table) {
            if (!Schema::hasColumn('pastes', 'user_id')) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');// idカラムの後にuser_idカラムを追加

            // 外部キー制約
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pastes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);// <- 追加
            $table->dropColumn('user_id');// <- 追加
        });
    }
}
