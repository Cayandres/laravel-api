<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;

class DashboardController extends Controller
{
    public function index()
    {
        //$project_deleted = Project::withTrashed()->find(2);

       // $project_deleted->restore();

        $number_projects = Project::all()->count();

        $number_projects_deleted = Project::onlyTrashed()->count();


        return view('admin.home', compact('number_projects', 'number_projects_deleted'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
