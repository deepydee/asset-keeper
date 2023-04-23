<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'title' => 'Электроника',
            'children' => [
                [
                    'title' => 'Компьютеры',
                    'children' => [
                        [
                            'title' => 'Комплектующие',
                            'children' => [
                                ['title' => 'Процессор'],
                                ['title' => 'Оперативная память'],
                                ['title' => 'Материнская плата'],
                                ['title' => 'Блоки питания'],
                            ],
                        ],
                        ['title' => 'Моноблоки'],
                        [
                            'title' => 'Переферия',
                            'children' => [
                                ['title' => 'Клавиатуры'],
                                ['title' => 'Мыши'],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Ноутбуки, планшеты',
                    'children' => [
                        [
                            'title' => 'Ноутбуки',
                            'children' => [
                                ['title' => 'Apple'],
                                ['title' => 'ASUS'],
                                ['title' => 'HP'],
                                ['title' => 'Acer'],
                                ['title' => 'Honor'],
                                ['title' => 'Microsoft'],
                            ],
                        ],
                        [
                            'title' => 'Планшеты',
                            'children' => [
                                ['title' => 'Apple'],
                                ['title' => 'Samsung'],
                                ['title' => 'Lenovo'],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        Category::create($categories);

        $categories = [
            'title' => 'Одежда и обувь',
            'children' => [
                [
                    'title' => 'Женщинам',
                    'children' => [
                        [
                            'title' => 'Одежда',
                            'children' => [
                                ['title' => 'Верхняя одежда'],
                                ['title' => 'Брюки'],
                                ['title' => 'Для спорта'],
                                ['title' => 'Костюмы'],
                            ],
                        ],
                        ['title' => 'Обувь'],
                        ['title' => 'Аксесуары'],
                    ],
                ],
                [
                    'title' => 'Мужчинам',
                    'children' => [
                        [
                            'title' => 'Одежда',
                            'children' => [
                                ['title' => 'Верхняя одежда'],
                                ['title' => 'Брюки'],
                                ['title' => 'Для спорта'],
                                ['title' => 'Костюмы'],
                            ],
                        ],
                        ['title' => 'Обувь'],
                        ['title' => 'Аксесуары'],
                    ],
                ],
            ],
        ];

        Category::create($categories);
    }
}
