<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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

        $this->call(ItemsTableSeeder::class);

        $this->call(CategorySeeder::class);

        $user1 = User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => bcrypt('password'),
        ]);

        $seller = User::create([
            'name' => 'Seller',
            'email' => 'seller@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        $item1 = Item::create([
            'name' => 'Item1',
            'description' => 'Description1',
            'price' => 1000,
            'seller_id' => $seller->id,
        ]);

        $item2 = Item::create([
            'name' => 'Item2',
            'description' => 'Description2',
            'price' => 2000,
            'seller_id' => $seller->id,
        ]);

        PurchaseHistory::create([
            'user_id' => $user1->id,
            'item_id' => $item1->id,
            'amount' => 1000,
            'payment_method' => 'credit_card',
        ]);

        PurchaseHistory::create([
            'user_id' => $user2->id,
            'item_id' => $item2->id,
            'amount' => 2000,
            'payment_method' => 'bank_transfer',
        ]);
    }
}
