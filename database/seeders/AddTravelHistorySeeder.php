<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\TravelHistory;
use Illuminate\Database\Seeder;

class AddTravelHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = Card::all();

        /** @var TravelHistory $travelHistoryModel */
        $travelHistoryModel = TravelHistory::class;

        foreach ($cards as $card) {
            $routes = [
                rand(1, 12),
                rand(1, 12),
                rand(1, 12),
            ];

            foreach ($routes as $route) {
                $travelHistoryModel::create([
                    'card_id' => $card->id,
                    'transport_route_id' => $route,
                ]);
            }
        }
    }
}
