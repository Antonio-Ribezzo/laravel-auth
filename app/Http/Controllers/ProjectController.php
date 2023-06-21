<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
//per lo storage delle immagini
use Illuminate\Support\Facades\Storage;
//per la validazione
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::All();

        return view('admin.pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();

        $newProject = new Project();
        // caricamneto dell'immagine se presente
        if($request->hasFile('cover_image')){
            //se esiste un file allora genero un path che mi indica dove verrà salvata l'immagine nel progetto
            $path = Storage::disk('public')->put('projects_images', $request->cover_image);

            $form_data['cover_image']= $path;
        }

        $newProject->fill($form_data);
        // dd($newProject);
        $newProject->save();

        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.pages.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();

        // caricamneto dell'immagine se presente
        if($request->hasFile('cover_image')){
            // se esiste un file
            // cancello la precedente immagine nello storage
            if($project->cover_image){
                Storage::delete($project->cover_image);
            }

            //genero un path che mi indica dove verrà salvata l'immagine nel progetto
            $path = Storage::disk('public')->put('projects_images', $request->cover_image);

            $form_data['cover_image']= $path;

        }

        $project->update($form_data);

        return redirect()->route('admin.project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->cover_image){
            Storage::delete($project->cover_image);
        }

        $project->delete();
        return redirect()->route('admin.project.index');
    }
}
