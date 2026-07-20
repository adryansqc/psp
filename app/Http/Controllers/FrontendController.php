<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
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

        return view('tailwind.page.beranda.home', compact('pinnedProjects', 'mapProjects', 'sliders'));
    }
    public function about()
    {
        $sliders = ImageSlider::active()->get();
        $aboutUs = AboutUs::first();
        $mapProjects = Project::whereNotNull('lokasi')->get();

        return view('tailwind.page.aboutus.about_us', compact('sliders', 'aboutUs', 'mapProjects'));
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
