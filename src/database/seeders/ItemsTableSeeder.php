<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'name' => '水',
            'description' => '水',
            'price' => 200,
            'condition' => '新品、未使用'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'name' => 'Tシャツ',
            'description' => 'Tシャツ',
            'price' => 1200,
            'condition' => '未使用に近い'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'name' => 'ベビーシューズ',
            'description' => '赤ちゃん用シューズ',
            'price' => 2000,
            'condition' => '目立った傷や汚れなし'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'name' => 'グローブ',
            'description' => '野球用グローブ',
            'price' => 5000,
            'condition' => 'やや傷や汚れあり'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'name' => 'テーブル',
            'description' => 'リビングテーブル',
            'price' => 4000,
            'condition' => '傷や汚れあり'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'name' => '雑誌',
            'description' => '週刊誌',
            'price' => 1000,
            'condition' => '全体的に状態が悪い'
        ];
        DB::table('items')->insert($param);

    }
}
