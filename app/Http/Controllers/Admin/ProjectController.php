<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Helpers\CustomHelper;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Project());

        if (array_key_exists('image', $form_data)) {

            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

            $form_data['image_path'] = Storage::put('uploads/', $form_data['image']);
        }


        $new_project = new Project();
        $new_project->fill($form_data);
        $new_project->save();


        return redirect()->route('admin.project.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $form_data = $request->all();

        if ($form_data['name'] !== $project->name) {
            $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['name'], new Project());
        } else {
            $form_data['slug'] = $project->slug;
        }

        if (array_key_exists('image', $form_data)) {

            if ($project->image) {
                Storage::disk('public')->delete($project->image_path);
            }

                $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

                $form_data['image_path'] = Storage::put('uploads/', $form_data['image']);

        }

        $project->update($form_data);

        return redirect()->route('admin.project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }
        $project->delete();

        return redirect()->route('admin.project.index');
    }
}
