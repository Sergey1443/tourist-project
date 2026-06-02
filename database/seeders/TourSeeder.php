<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        $tours = [
            [
                'name' => 'Таганай. Поход на Двуглавую сопку',
                'date' => '2025-07-29',
                'price' => 1950,
                'image' => 'tour1.jpg'
            ],
            [
                'name' => 'Аракульский Шихан + озеро Аракуль',
                'date' => '2025-08-19',
                'price' => 2200,
                'image' => 'tour2.jpg'
            ],
            [
                'name' => '"Холзан" - питомник хищных птиц',
                'date' => '2025-08-09',
                'price' => 2100,
                'image' => 'tour3.jpg'
            ],
            [
                'name' => 'Обзорная экскурсия по Челябинску',
                'date' => '2025-07-01',
                'price' => 650,
                'image' => 'tour4.jpg'
            ],
            [
                'name' => 'Стеклянная сказка. В гости к стеклодувам!',
                'date' => '2025-08-07',
                'price' => 3000,
                'image' => 'tour5.jpg'
            ],
            [
                'name' => 'Купеческий Троицк',
                'date' => '2025-08-02',
                'price' => 1900,
                'image' => 'tour6.jpg'
            ],
            [
                'name' => 'Обзорная экскурсия по Екатеринбургу',
                'date' => '2025-07-15',
                'price' => 2600,
                'image' => 'tour7.jpg'
            ],
        ];

        foreach ($tours as $tour) {
            Tour::create($tour);
        }
    }
}