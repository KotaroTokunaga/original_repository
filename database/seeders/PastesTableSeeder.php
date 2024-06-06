<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PastesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //以下追加

        DB::table('pastes')->insert([

            ['pasta'=>'1つ目のパスタになります'],

            ['pasta'=>'Laravelのパスタクッキングページを作りました'],

            ['pasta'=>'パスタクッキングについてのCRUD一式を作っています'],

            ['pasta'=>'茹でて食べるだなんて今の時代に…'],

            ['pasta'=>'蟹道楽…'],

            ['pasta'=>'ロトシックス100億円'],

            ['pasta'=>'フォークの進みが！！止まらねェ！！！']
        ]);
    }
}
