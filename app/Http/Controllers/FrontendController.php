<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Berita;
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
        $beritas = Berita::latest()->get();

        return view('tailwind.page.beranda.home', compact('pinnedProjects', 'mapProjects', 'sliders', 'beritas'));
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

    public function allBerita()
    {
        $beritas = Berita::latest()->get();

        return view('tailwind.page.berita.berita_acara', compact('beritas'));
    }
    public function project($uuid)
    {
        $project = Project::with(['galleries', 'logos'])
            ->where('uuid', $uuid)
            ->firstOrFail();

        return view('tailwind.page.project.project-detail', compact('project'));
    }

    public function projectResidensial()
    {
        $projects = Project::residensial()->latest()->get();
        $mapProjects = Project::residensial()->whereNotNull('lokasi')->get();

        return view('tailwind.page.project.project', [
            'projects'    => $projects,
            'mapProjects' => $mapProjects,
            'kategori'    => 'residensial',
            'title'       => 'Proyek Residensial',
        ]);
    }

    public function projectCommercial()
    {
        $projects = Project::commercialArea()->latest()->get();
        $mapProjects = Project::commercialArea()->whereNotNull('lokasi')->get();

        return view('tailwind.page.project.project', [
            'projects'    => $projects,
            'mapProjects' => $mapProjects,
            'kategori'    => 'commercial_area',
            'title'       => 'Kawasan Komersial',
        ]);
    }

    public function projectHotelResort()
    {
        $projects = Project::hotelAndArea()->latest()->get();
        $mapProjects = Project::hotelAndArea()->whereNotNull('lokasi')->get();

        return view('tailwind.page.project.project', [
            'projects'    => $projects,
            'mapProjects' => $mapProjects,
            'kategori'    => 'hotel_resort',
            'title'       => 'Hotel & Resort',
        ]);
    }
    public function contact()
    {
        $faqs = Faq::active()->get();
        $mapProjects = Project::whereNotNull('lokasi')->get();

        return view('fe.page.contactUs.contactus', compact('faqs', 'mapProjects'));
    }
}
