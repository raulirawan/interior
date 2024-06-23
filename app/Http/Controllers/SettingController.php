<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function edit()
    {
        $setting = Setting::first();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'about_us' => 'required',
            'phone' => 'required|max:255',
            'link_whatsapp' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $data = $validator->validated();

        $setting = Setting::first();

        if ($setting->update($data)) {
            Alert::success('Success', 'Data Has Successfully Updated');
            return redirect()->route('admin.settings.index');
        } else {
            Alert::error('Error', 'Data Has Failed Updated');
            return redirect()->route('admin.settings.index');
        }
    }
}
