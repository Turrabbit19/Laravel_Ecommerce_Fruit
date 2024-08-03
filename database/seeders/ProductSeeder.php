<?php

namespace Database\Seeders;

use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // thêm size
        foreach (['S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create([
                'name' => $item
            ]);
        }

        // thêm màu
        foreach (['black', 'white', 'gray', 'green', 'yellow', 'red'] as $item) {
            ProductColor::query()->create([
                'name' => $item
            ]);
        }
    }
}