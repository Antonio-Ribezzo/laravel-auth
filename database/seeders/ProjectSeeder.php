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
        // $newProject->thumb = ;
        $newProject->buyer = 'ME';
        $newProject->project_date = '2023-05-12';
        $newProject->programming_languages = 'Vue Js';

        $newProject->save();
    }
}
