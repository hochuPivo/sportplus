<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'brand' => 'Jögel',
                'name' => 'Кроссовки спортивные Airstream 3.0 JSH504-Y, черный',
                'price' => 3599.00,
                'badge' => 'Хит',
                'image' => 'images/product-jogel-airstream.png',
                'category' => 'shoes',
                'in_stock' => true,
            ],
            [
                'brand' => 'GO DO',
                'name' => 'Гантель GO DO виниловая. Вес 2,5 кг. (Оранжевый)',
                'price' => 1190.00,
                'badge' => 'Хит',
                'image' => 'images/product-godo-dumbbell.png',
                'category' => 'fitness',
                'in_stock' => true,
            ],
            [
                'brand' => 'Starfit',
                'name' => 'Коврик для йоги FM-301, NBR, 183x58x1,5 см, оранжевый',
                'price' => 1130.00,
                'badge' => 'Хит',
                'image' => 'images/product-starfit-mat.png',
                'category' => 'yoga',
                'in_stock' => true,
            ],
            [
                'brand' => 'Rusco',
                'name' => 'Перчатки для рукопашного боя, к/з, черный',
                'price' => 1449.00,
                'badge' => 'Хит',
                'image' => 'images/product-rusco-gloves.png',
                'category' => 'combat',
                'in_stock' => true,
            ],
            [
                'brand' => 'Ridex',
                'name' => 'Ролики раздвижные Wing Blue, пластиковая рама',
                'price' => 3549.00,
                'badge' => 'Хит',
                'image' => 'images/product-ridex-rollers.png',
                'category' => 'rollers',
                'in_stock' => true,
            ],
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
