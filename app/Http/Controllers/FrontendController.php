<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $projects = Project::latest()->get();

        return view('fe.page.beranda.home', compact('projects'));
    }
    public function about()
    {
        return view('fe.page.about.about');
    }

    public function allProject()
    {
        $projects = Project::latest()->get();

        return view('fe.page.project.project', compact('projects'));
    }
    public function project($uuid)
    {
        $project = Project::with('galleries')
            ->where('uuid', $uuid)
            ->firstOrFail();

        return view('fe.page.project.project-details', compact('project'));
    }
    public function contact()
    {
        return view('fe.page.contactUs.contactus');
    }
}
