<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with('category','tags')->paginate(5);

        return response()->json($projects);
    }

    public function getProjectDetail($slug){
        $project = Project::where('slug', $slug)->with('category','tags')->first();
        if($project->image_path)$project->image_path= asset('storage/' .$project->image_path);
        else{
            $project->image_path = 'non ci sono immagini';
            $project->image_original_name = '-no image-';


        }

        return response()->json($project);
    }
}
