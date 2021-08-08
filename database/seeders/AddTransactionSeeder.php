<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class AddTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = Card::all();

        /** @var Transaction $transactionModel */
        $transactionModel = Transaction::class;

        foreach ($cards as $card) {
            $transactions = [
                [
                    'type' => 'Поповнення',
                    'cost' => rand(10, 100),
                ],
                [
                    'type' => 'Проїзд',
                    'cost' => rand(1, 6),
                ]
            ];

            foreach ($transactions as $transaction) {
                $transactionModel::create([
                    'type' => $transaction['type'],
                    'card_id' => $card->id,
                    'cost' => $transaction['cost'],
                ]);
            }
        }
    }
}
