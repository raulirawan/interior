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
            'image.*' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable',
        ]);


        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            $dataImage = [];
            foreach ($request->file('image') as $key => $val) {
                $tujuan_upload = 'image/projects/';
                $nama_file = time() . "_" . $val->getClientOriginalName();
                $nama_file = str_replace(' ', '', $nama_file);
                $val->move($tujuan_upload, $nama_file);

                $dataImage[] = $nama_file;
            }
            $image = json_encode($dataImage);

            $data['image'] = $image;
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
            'image.*' => 'image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable',
        ]);

        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        // if ($request->hasFile('image')) {
        //     $oldFile = 'image/projects/' . $project->getRawOriginal('image');
        //     $file = $request->file('image');
        //     $tujuan_upload = 'image/projects/';
        //     $nama_file = time() . "_" . $file->getClientOriginalName();
        //     $nama_file = str_replace(' ', '', $nama_file);
        //     $file->move($tujuan_upload, $nama_file);
        //     if (File::exists($oldFile)) {
        //         File::delete($oldFile);
        //     }
        //     $data['image'] = $nama_file;
        // }

        if ($request->hasFile('image')) {
            $dataImage = [];
            foreach ($request->file('image') as $key => $val) {
                $tujuan_upload = 'image/projects/';
                $nama_file = time() . "_" . $val->getClientOriginalName();
                $nama_file = str_replace(' ', '', $nama_file);
                $val->move($tujuan_upload, $nama_file);

                $dataImage[] = $nama_file;
            }
            if ($project->image != null) {
                $oldImage = json_decode($project->image);
                $newImage = array_merge($oldImage, $dataImage);
                $image = json_encode($newImage);
            } else {
                $image = json_encode($dataImage);
            }

            $dataUpdate = [
                'image' => $image,
            ];
        }
        if ($project->update($dataUpdate)) {
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
                $images = json_decode($project->image);
                foreach ($images as $value) {
                    if (file_exists('/image/projects/' . $value)) {
                        unlink($value);
                    }
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
    public function deleteImage(Project $project, $keyImage)
    {
        $image = json_decode($project->image);
        $imageNew = [];

        foreach ($image as $key => $value) {
            if ($key == $keyImage) {
                if (file_exists($value)) {
                    unlink($value);
                }
                unset($value);
            } else {
                $imageNew[] = $value;
            }
        }
        $newImage = json_encode($imageNew);

        $data = [
            'image' => $newImage
        ];

        if ($project->update($data)) {
            Alert::success('Success', 'Image Successfully Deleted');
            return redirect()->route('admin.projects.edit', $project->id);
        } else {
            Alert::error('Error', 'Data Gagal di Hapus');
            return redirect()->route('admin.projects.edit', $project->id);
        }
    }
}
