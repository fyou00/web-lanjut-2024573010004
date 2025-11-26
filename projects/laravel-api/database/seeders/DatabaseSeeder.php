<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Product::create([
            'name' => 'Laptop',
            'price' => 15000000,
            'description' => 'Laptop gaming terbaru',
            'stock' => 10
        ]);

        Product::create([
            'name' => 'TV Monitor 1000943 inch',
            'price' => 2000000,
            'description' => 'Monitor gaming terbaru',
            'stock' => 2
        ]);
    }
}
