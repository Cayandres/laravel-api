<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Project;
use Faker\Generator as Faker;
use App\Helpers\CustomHelper;
use App\Models\Category;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_project = new Project();
            $new_project->name = $faker->sentence(1);
            $new_project->slug = CustomHelper::generateUniqueSlug($new_project->name, new Project());
            $new_project->description = $faker->sentence(5);
            $new_project->creation_date = $faker->date();
            $new_project->category_id = Category::inRandomOrder()->first()->id;
            $new_project->save();
        }
    }
}
