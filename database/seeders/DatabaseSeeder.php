<?php

namespace Database\Seeders;

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
        $this->call([
            CreateUserSeeder::class,
            AddCardSeeder::class,
            CityTableSeeder::class,
            CardTypeTableSeeder::class,
            TransportTableSeeder::class,
            AddTransactionSeeder::class,
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            AddTravelHistorySeeder::class,
            TransportRouteTableSeeder::class,
        ]);
    }
}
