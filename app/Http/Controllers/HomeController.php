<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $blogs = Blog::limit(2)->get();
        $testimonials = Testimonial::whereNotNull('testimoni')->get();
        $projects = Project::all();
        $services = Service::all();
        $categories = Category::with(['projects'])->get();
        return view('home', compact('services', 'projects', 'categories', 'testimonials', 'blogs'));
    }

    public function aboutUs()
    {
        $testimonials = Testimonial::whereNotNull('testimoni')->get();

        return view('about-us', compact('testimonials'));
    }

    public function projects()
    {
        $projects = Project::all();
        $categories = Category::with(['projects'])->get();
        return view('projects', compact('projects', 'categories'));
    }

    public function projectsDetail(Project $project, $slug)
    {
        return view('projects-detail', compact('project'));
    }


    public function services()
    {
        $services = Service::all();

        return view('services', compact('services'));
    }

    public function servicesDetail(Service $service, $slug)
    {
        return view('services-detail', compact('service'));
    }

    public function blogs()
    {
        $blogs = Blog::limit(2)->get();
        return view('blogs', compact('blogs'));
    }

    public function blogsDetail(Blog $blog, $slug)
    {
        return view('blogs-detail', compact('blog'));
    }

    public function contactUs()
    {
        return view('contact-us');
    }
}
