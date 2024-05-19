<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $param = [
            'category' => '食品・飲料・酒'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'ファッション'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'ベビー・キッズ'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'スポーツ'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => '家具・インテリア'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => '本・雑誌・漫画'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'メンズ'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'レディース'
        ];
        DB::table('categories')->insert($param);
    }
}
