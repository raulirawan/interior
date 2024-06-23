<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProject = Project::count();
        $totalService = Service::count();
        $totalBlog = Blog::count();
        $totalTestimoni = Testimonial::whereNotNull('testimoni')->count();
        return view('admin.dashboard', compact('totalProject', 'totalService', 'totalBlog', 'totalTestimoni'));
    }
}
