<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\ImageSlider;
use App\Models\Project;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $pinnedProjects = Project::where('pin', true)
            ->latest()
            ->take(5)
            ->get();
        if ($pinnedProjects->isEmpty()) {
            $pinnedProjects = Project::latest()->take(5)->get();
        }

        $mapProjects = Project::whereNotNull('lokasi')->get();
        $sliders = ImageSlider::active()->get();

        return view('fe.page.beranda.home', compact('pinnedProjects', 'mapProjects', 'sliders'));
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
        $faqs = Faq::active()->get();
        $mapProjects = Project::whereNotNull('lokasi')->get();

        return view('fe.page.contactUs.contactus', compact('faqs', 'mapProjects'));
    }
}
