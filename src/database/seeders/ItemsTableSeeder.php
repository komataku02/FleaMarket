<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::where('email', 'admin@example.com')->first();

        if ($adminUser) {
            $adminUserId = $adminUser->id;

            $items = [
                [
                    'user_id' => $adminUser->id,
                    'name' => '水',
                    'description' => '水',
                    'price' => 200,
                    'condition' => '新品、未使用'
                ],
                [
                    'user_id' => $adminUser->id,
                    'name' => 'Tシャツ',
                    'description' => 'Tシャツ',
                    'price' => 1200,
                    'condition' => '未使用に近い'
                ],
                [
                    'user_id' => $adminUser->id,
                    'name' => 'ベビーシューズ',
                    'description' => '赤ちゃん用シューズ',
                    'price' => 2000,
                    'condition' => '目立った傷や汚れなし'
                ],
                [
                    'user_id' => $adminUser->id,
                    'name' => 'グローブ',
                    'description' => '野球用グローブ',
                    'price' => 5000,
                    'condition' => 'やや傷や汚れあり'
                ],
                [
                    'user_id' => $adminUser->id,
                    'name' => 'テーブル',
                    'description' => 'リビングテーブル',
                    'price' => 4000,
                    'condition' => '傷や汚れあり'
                ],
                [
                    'user_id' => $adminUser->id,
                    'name' => '雑誌',
                    'description' => '週刊誌',
                    'price' => 1000,
                    'condition' => '全体的に状態が悪い'
                ],
            ];

            DB::table('items')->insert($items);
        } else {
            echo "Admin user not found. Please check your seeder data.";
        }
    }
}
