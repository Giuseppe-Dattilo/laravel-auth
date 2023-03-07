<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
       for($i = 0; $i < 5; $i++){
        $project = new Project();

        $project->name = $faker->words(3, true);
        $project->description = $faker->paragraphs(15, true);
        $project->image = $faker->imageUrl(250, 250);
        $project->prog_url = $faker->url();
        $project->save();
       }
    }
}
