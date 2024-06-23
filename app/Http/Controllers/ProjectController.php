<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{


    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable',
        ]);


        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $tujuan_upload = 'image/projects/';
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $nama_file = str_replace(' ', '', $nama_file);
            $file->move($tujuan_upload, $nama_file);

            $data['image'] = $nama_file;
        }

        if (Project::create($data)) {
            Alert::success('Success', 'Data Has Successfully Saved');
            return redirect()->route('admin.projects.index');
        } else {
            Alert::error('Error', 'Data Has Failed Saved');
            return redirect()->route('admin.projects.index');
        }
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable',
        ]);

        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        if ($request->hasFile('image')) {
            $oldFile = 'image/projects/' . $project->getRawOriginal('image');
            $file = $request->file('image');
            $tujuan_upload = 'image/projects/';
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $nama_file = str_replace(' ', '', $nama_file);
            $file->move($tujuan_upload, $nama_file);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $data['image'] = $nama_file;
        }
        if ($project->update($data)) {
            Alert::success('Success', 'Data Has Successfully Updated');
            return redirect()->route('admin.projects.index');
        } else {
            Alert::error('Error', 'Data Has Failed Updated');
            return redirect()->route('admin.projects.index');
        }
    }

    public function delete(Project $project)
    {
        try {
            if ($project->delete()) {
                $oldFile = 'image/projects/' . $project->getRawOriginal('image');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                Alert::success('Success', 'Data Has Successfully Deleted');
                return redirect()->route('admin.projects.index');
            } else {
                Alert::error('Error', 'Data Has Failed Deleted');
                return redirect()->route('admin.projects.index');
            }
        } catch (\Throwable $th) {
            Log::error("Error Delete Projects: " . $th);
            Alert::error('Error', 'Server Error, Try Again!');
            return redirect()->route('admin.projects.index');
        }
    }
}
