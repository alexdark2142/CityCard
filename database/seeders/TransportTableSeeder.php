<?php

namespace Database\Seeders;

use App\Models\Transport;
use Illuminate\Database\Seeder;

class TransportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transports = [
            [
                'type' => 'Автобус',
                'tariff' => 6,
            ],
            [
                'type' => 'Троллейбус',
                'tariff' => 2,
            ],
        ];

        /** @var Transport $transportModel */
        $transportModel = Transport::class;

        foreach ($transports as $transport) {
            $transportModel::create([
                'type' => $transport['type'],
                'tariff' => $transport['tariff'],
            ]);
        }
    }
}
