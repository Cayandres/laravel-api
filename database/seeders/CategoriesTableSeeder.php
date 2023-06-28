<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Helpers\CustomHelper;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['CSS', 'HTML', 'JAVASCRIPT', 'C++', 'VUE', 'PHP'];

        foreach ($data as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = CustomHelper::generateUniqueSlug($new_category->name, new Category());
            $new_category->save();
        }
    }

}
