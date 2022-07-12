<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(3)->create();
        User::factory(10)->create();
        Profile::factory(10)->create();
        Product::factory(10)->create();
        Category::factory(5)->create();

//        Order::factory(10)->create()->each(function($order) {
//            $ids = range(1, 10);
//            shuffle($ids);//trộn
//            $sliced = array_slice($ids, 1, 3);
//            $order->products()->attach($sliced);
//        });
    }
}
