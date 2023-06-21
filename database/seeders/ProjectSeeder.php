<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newProject = new Project();
        $newProject->title = 'Boolflix';
        $newProject->description = 'Replica del layout di Netflix con implementazione della ricerca dei film';
        $newProject->buyer = 'ME';
        $newProject->cover_image='https://cdn.dribbble.com/users/9378043/screenshots/16832559/media/10b207c918d604662e088308d16b366d.png';
        $newProject->project_date = '2023-05-12';
        $newProject->programming_languages = 'Vue Js';
        $newProject->link = 'https://github.com/Antonio-Ribezzo/vite-boolflix';

        $newProject->save();
    }
}
