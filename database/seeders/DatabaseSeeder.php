<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //creating first user
        User::create(
            [
               "name" => "Admin",
               "email" => "admin@admin.com",
               "password" => Hash::make( "password"),
            ]);

        $this->call( ShopSeeder::class);
        $this->call( CustomerSeeder::class);
    }
}
