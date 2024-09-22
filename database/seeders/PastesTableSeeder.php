<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Models\Paste;


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

        Paste::create(

            ['pasta'=>'1つ目のパスタになります']

        );
        Paste::create(

            ['pasta'=>'Laravelのパスタクッキングページを作りました']

        );
        Paste::create(

            ['pasta'=>'茹でて食べよう']

        );
        Paste::create(

            ['pasta'=>'パスタクッキングについてのCRUD一式を作っています']

        );
        Paste::create(

            ['pasta'=>'ジェノベーゼ'],

        );
        Paste::create(

            ['pasta'=>'ロトシックス100億円']

        );
        Paste::create(

            ['pasta'=>'フォークで食べ進めよう']

        );

    }
}
