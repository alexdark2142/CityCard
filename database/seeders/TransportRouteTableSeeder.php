<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\TransportRoute;
use Illuminate\Database\Seeder;

class TransportRouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = [
            [
                'from' => 'вул. Ковельська',
                'to' => 'просп. Волі',
            ],
            [
                'from' => 'просп. Соборності',
                'to' => 'вул. Львівська',
            ],
            [
                'from' => 'вул. Рівненська',
                'to' => 'вул. Шопена',
            ],
            [
                'from' => 'вул. Винниченка',
                'to' => 'вул. Стрілецька',
            ],
        ];

        /** @var TransportRoute $routeModel */
        $routeModel = TransportRoute::class;

        foreach (City::all() as $city) {
            foreach ($routes as $route) {
                $routeModel::create([
                    'city_id' => $city->id,
                    'from' => $route['from'],
                    'to' => $route['to'],
                ]);
            }
        }
    }
}
