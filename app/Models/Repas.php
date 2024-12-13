<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Repas;

class RepasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // إضافة بيانات لجدول Repas
        Repas::create([
            'nom' => 'Espresso',
            'prix' => 15,
            'type' => 'Drink',
            'description' => 'Strong coffee served in small amounts.',
            'image' => 'espresso.jpg',
        ]);

        Repas::create([
            'nom' => 'Cappuccino',
            'prix' => 20,
            'type' => 'Drink',
            'description' => 'Espresso with steamed milk and milk foam.',
            'image' => 'cappuccino.jpg',
        ]);

        Repas::create([
            'nom' => 'Pancake',
            'prix' => 10,
            'type' => 'Dessert',
            'description' => 'Fluffy pancakes served with syrup.',
            'image' => 'pancake.jpg',
        ]);

        Repas::create([
            'nom' => 'Crepe',
            'prix' => 12,
            'type' => 'Dessert',
            'description' => 'Thin pancake filled with a variety of ingredients.',
            'image' => 'crepe.jpg',
        ]);

        Repas::create([
            'nom' => 'Gaufre',
            'prix' => 14,
            'type' => 'Dessert',
            'description' => 'Belgian waffle with your choice of toppings.',
            'image' => 'gaufre.jpg',
        ]);

        Repas::create([
            'nom' => 'Smoothie',
            'prix' => 18,
            'type' => 'Drink',
            'description' => 'Fresh fruit blended with yogurt.',
            'image' => 'smoothie.jpg',
        ]);

        Repas::create([
            'nom' => 'Mojito',
            'prix' => 22,
            'type' => 'Drink',
            'description' => 'Refreshing cocktail with mint and lime.',
            'image' => 'mojito.jpg',
        ]);

        Repas::create([
            'nom' => 'Fondue Au Chocolat',
            'prix' => 30,
            'type' => 'Dessert',
            'description' => 'Melted chocolate served with fruit and marshmallows.',
            'image' => 'fondue.jpg',
        ]);
    }
}
