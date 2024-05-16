<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::query()->create([
            'name' => 'خادم',
            'image' => ' '
        ]);

        Category::query()->create([
            'name' => 'ممرض',
            'image' => ' '
        ]);

        Category::query()->create([
            'name' => 'سائق',
            'image' => ' '
        ]);


        Category::query()->create([
            'name' => 'جليسه اطفال',
            'image' => ' '
        ]);

        Category::query()->create([
            'name' => 'طباخ',
            'image' => ' '
        ]);

    }
}
