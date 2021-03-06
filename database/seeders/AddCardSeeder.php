<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::whereEmail('test@gmail.com')->firstOrFail()->id;

        /** @var Card $cardModel */
        $cardModel = Card::class;

        for ($i = 0; $i < 4; $i++) {
            $cardData = $cardModel::create([
                'number' => time(),
                'user_id' => $userId,
                'card_type_id' => rand(1, 4),
                'city_id' => rand(1, 3),
                'balance' => rand(1, 500),
            ]);

            $cardData->number = $cardData->number . $cardData->id;
            $cardData->save();
        }
    }
}
