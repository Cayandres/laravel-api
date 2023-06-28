<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Helpers\CustomHelper;
use App\Models\Admin\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Front-end', 'Back-end', 'UX', 'JS', 'VUE'];

        foreach ($data as $category) {
            $new_tag = new Tag();
            $new_tag->name = $category;
            $new_tag->slug = CustomHelper::generateUniqueSlug($new_tag->name, new Tag());
            $new_tag->save();
        }
    }
}
