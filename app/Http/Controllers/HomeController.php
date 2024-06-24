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
        return view('home', compact('services', 'projects', 'categories','testimonials','blogs'));
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function projects()
    {
        return view('projects');
    }

    public function services()
    {
        return view('services');
    }

    public function blogs()
    {
        return view('blogs');
    }

    public function contactUs()
    {
        return view('contact-us');
    }
}
