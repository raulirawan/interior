<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{


    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable',
        ]);


        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $tujuan_upload = 'image/services/';
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $nama_file = str_replace(' ', '', $nama_file);
            $file->move($tujuan_upload, $nama_file);

            $data['image'] = $nama_file;
        }

        if (Service::create($data)) {
            Alert::success('Success', 'Data Has Successfully Saved');
            return redirect()->route('admin.services.index');
        } else {
            Alert::error('Error', 'Data Has Failed Saved');
            return redirect()->route('admin.services.index');
        }
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable',
        ]);

        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        if ($request->hasFile('image')) {
            $oldFile = 'image/services/' . $service->getRawOriginal('image');
            $file = $request->file('image');
            $tujuan_upload = 'image/services/';
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $nama_file = str_replace(' ', '', $nama_file);
            $file->move($tujuan_upload, $nama_file);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            $data['image'] = $nama_file;
        }
        if ($service->update($data)) {
            Alert::success('Success', 'Data Has Successfully Updated');
            return redirect()->route('admin.services.index');
        } else {
            Alert::error('Error', 'Data Has Failed Updated');
            return redirect()->route('admin.services.index');
        }
    }

    public function delete(Service $service)
    {
        try {
            if ($service->delete()) {
                $oldFile = 'image/services/' . $service->getRawOriginal('image');
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                Alert::success('Success', 'Data Has Successfully Deleted');
                return redirect()->route('admin.services.index');
            } else {
                Alert::error('Error', 'Data Has Failed Deleted');
                return redirect()->route('admin.services.index');
            }
        } catch (\Throwable $th) {
            Log::error("Error Delete Services: " . $th);
            Alert::error('Error', 'Server Error, Try Again!');
            return redirect()->route('admin.services.index');
        }
    }
}
