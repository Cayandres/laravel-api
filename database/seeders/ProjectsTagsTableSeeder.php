<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Tag;
use App\Models\Admin\Project;

class ProjectsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $project = Project::inRandomOrder()->first();

            $tag_id = Tag::inRandomOrder()->first()->id;

            $project->tags()->attach($tag_id);

        }
    }
}
