<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePastaToContentsInPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pastes', function (Blueprint $table) {
            $table->renameColumn('pasta', 'contents'); // pastaカラムをcontentsに変更
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
            $table->renameColumn('contents', 'pasta'); // contentsカラムをpastaに戻す
        });
    }
}
