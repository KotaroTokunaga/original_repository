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

            $table->string('pasta',255);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::drop('pastes');
    }
}
