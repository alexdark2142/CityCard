<?php

namespace Database\Seeders;

use App\Models\CardType;
use Illuminate\Database\Seeder;

class CardTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Стандартна',
                'cost_in_percent' => 100,
            ],
            [
                'name' => 'Студентська',
                'cost_in_percent' => 70,
            ],
            [
                'name' => 'Пільгова',
                'cost_in_percent' => 50,
            ],
            [
                'name' => 'Привілейована',
                'cost_in_percent' => 0,
            ],
        ];

        /** @var CardType $cardTypeModel */
        $cardTypeModel = CardType::class;

        foreach ($types as $type) {
            $cardTypeModel::create([
                'name' => $type['name'],
                'cost_in_percent' => $type['cost_in_percent'],
            ]);
        }
    }
}
