<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $projects = Project::orderBy('updated_at', 'DESC')->get();
       return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $project = new Project();
       return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|unique:projects',
            'description' => 'required|string',
            'image' => 'nullable|url',
            'prog_url'=> 'nullable|url'
        ], [
            'name.unique' => "Il Nome $request->name è già presente",
            'name.required' => 'Il campo Nome è obbligatorio',
            'description.required' => 'Il campo Contenuto è obbligatorio',
            'image.url' => 'Inserire un link valido',
            'prog_url.url'=> 'Inserire un link valido',
        ]);

        $data = $request->all();
        $project = new Project();
        $project->fill($data);
        $project->save();

        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('Nuovo progetto creato con successo!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
       return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $request->validate([
            'name' => ['required', 'string', Rule::unique('projects')->ignore($project->id)],
            'description' => 'required|string',
            'image' => 'nullable|url',
            'prog_url'=> 'nullable|url'
        ], [
            'name.unique' => "Il Nome $request->name è già presente",
            'name.required' => 'Il campo Nome è obbligatorio',
            'description.required' => 'Il campo Contenuto è obbligatorio',
            'image.url' => 'Inserire un link valido',
            'prog_url.url'=> 'Inserire un link valido',
        ]);

        $data = $request->all();
        
        $project->update($data);

        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('msg', "Il progetto è stato modificato con successo");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
      $project->delete();
      return to_route('admin.projects.index')->with('type', 'danger')->with('msg', "Il progetto '$project->name' è stato cancellato con successo");
    }
}
