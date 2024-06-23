<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function generate()
    {
        $code = Str::upper(Str::random(15));

        $data = [
            'code' => $code,
        ];

        if (Testimonial::create($data)) {
            Alert::success('Success', 'Data Has Successfully Generated');
            return redirect()->route('admin.testimonials.index');
        } else {
            Alert::error('Error', 'Data Has Failed Generated');
            return redirect()->route('admin.testimonials.index');
        }
    }

    public function delete(Testimonial $testimonial)
    {
        try {
            if ($testimonial->delete()) {
                Alert::success('Success', 'Data Has Successfully Deleted');
                return redirect()->route('admin.testimonials.index');
            } else {
                Alert::error('Error', 'Data Has Failed Deleted');
                return redirect()->route('admin.testimonials.index');
            }
        } catch (\Throwable $th) {
            Log::error("Error Delete Testimonial: " . $th);
            Alert::error('Error', 'Server Error, Try Again!');
            return redirect()->route('admin.testimonials.index');
        }
    }
}
