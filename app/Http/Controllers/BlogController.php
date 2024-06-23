<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{


    public function index()
    {
        $blogs = Blog::where('user_id', Auth::user()->id ?? NULL)->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable',
        ]);

        $data = $validator->validated();

        $data['date'] = Carbon::parse($data['date'])->format('Y-m-d H:i:s');
        $data['user_id'] = Auth::user()->id;
        $data['slug'] = Str::slug($data['name']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $tujuan_upload = 'image/blogs/';
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $nama_file = str_replace(' ', '', $nama_file);
            $file->move($tujuan_upload, $nama_file);

            $data['image'] = $nama_file;
        }

        if (Blog::create($data)) {
            Alert::success('Success', 'Data Has Successfully Saved');
            return redirect()->route('admin.blogs.index');
        } else {
            Alert::error('Error', 'Data Has Failed Saved');
            return redirect()->route('admin.blogs.index');
        }
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable',
        ]);

        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['date'] = Carbon::parse($data['date'])->format('Y-m-d H:i:s');
        if ($request->hasFile('image')) {
            $oldFile = 'image/blogs/' . $blog->getRawOriginal('image');
            $file = $request->file('image');
            $tujuan_upload = 'image/blogs/';
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $nama_file = str_replace(' ', '', $nama_file);
            $file->move($tujuan_upload, $nama_file);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $data['image'] = $nama_file;
        }
        if ($blog->update($data)) {
            Alert::success('Success', 'Data Has Successfully Updated');
            return redirect()->route('admin.blogs.index');
        } else {
            Alert::error('Error', 'Data Has Failed Updated');
            return redirect()->route('admin.blogs.index');
        }
    }

    public function delete(Blog $blog)
    {
        try {
            if ($blog->delete()) {
                $oldFile = 'image/blogs/' . $blog->getRawOriginal('image');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                Alert::success('Success', 'Data Has Successfully Deleted');
                return redirect()->route('admin.blogs.index');
            } else {
                Alert::error('Error', 'Data Has Failed Deleted');
                return redirect()->route('admin.blogs.index');
            }
        } catch (\Throwable $th) {
            Log::error("Error Delete Blogs: " . $th);
            Alert::error('Error', 'Server Error, Try Again!');
            return redirect()->route('admin.blogs.index');
        }
    }
}
