<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Item;
use App\Models\PurchaseHistory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CategorySeeder::class);

        $this->call(ItemsTableSeeder::class);

        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $user1 = User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        $user2 = User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        $this->call(ItemsTableSeeder::class);

        $item1 = Item::where('name', '水')->first();
        $item2 = Item::where('name', 'Tシャツ')->first();

        PurchaseHistory::create([
            'user_id' => $user1->id,
            'item_id' => $item1->id,
            'amount' => 200,
            'payment_method' => 'credit_card',
        ]);

        PurchaseHistory::create([
            'user_id' => $user2->id,
            'item_id' => $item2->id,
            'amount' => 1200,
            'payment_method' => 'bank_transfer',
        ]);
    }
}
