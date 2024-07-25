<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index()
    {
        $blogs = Blog::limit(2)->get();
        $testimonials = Testimonial::whereNotNull('testimoni')->where('is_show', 1)->get();
        $projects = Project::all();
        $services = Service::all();
        $categories = Category::with(['projects'])->get();
        return view('home', compact('services', 'projects', 'categories', 'testimonials', 'blogs'));
    }

    public function aboutUs()
    {
        $testimonials = Testimonial::whereNotNull('testimoni')->where('is_show', 1)->get();

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

    public function clients()
    {
        $clients = Client::all();
        return view('clients', compact('clients'));
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

    public function testimoni($code)
    {
        $testimoni = Testimonial::where('code', $code)->whereNull('testimoni')->first();
        if (!$testimoni) {
            Alert::error('Error', 'Not Found');
            return redirect()->route('home');
        }
        return view('testimoni', compact('testimoni'));
    }

    public function testimoniStore(Request $request, $code)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'testimoni' => 'required|string',
        ]);

        $data = $validator->validated();

        $testimoni = Testimonial::where('code', $code)->first();

        if (!$testimoni) {
            Alert::error('Error', 'Not Found');
            return redirect()->route('home');
        }

        if ($testimoni->update($data)) {
            Alert::success('Success', 'Thanks For Your Feedback :)');
            return redirect()->route('home');
        } else {
            Alert::error('Error', 'Error, Try Again');
            return redirect()->route('testimoni', $code);
        }
    }
}
