<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'Луцьк',
            'Львів',
            'Київ',
        ];

        /** @var City $cityModel */
        $cityModel = City::class;

        foreach ($cities as $city) {
            $cityModel::create([
                'name' => $city,
            ]);
        }
    }
}
