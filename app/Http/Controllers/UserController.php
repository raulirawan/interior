<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id ?? '-')->get();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('create', true);
        }

        $data = $validator->validated();

        $data['password'] = bcrypt($data['password']);

        if (User::create($data)) {
            Alert::success('Success', 'Data Has Successfully Saved');
            return redirect()->route('admin.users.index');
        } else {
            Alert::error('Error', 'Data Has Failed Saved');
            return redirect()->route('admin.users.index');
        }
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('edit', true);
        }

        $data = $validator->validated();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        if ($user->update($data)) {
            Alert::success('Success', 'Data Has Successfully Updated');
            return redirect()->route('admin.users.index');
        } else {
            Alert::error('Error', 'Data Has Failed Updated');
            return redirect()->route('admin.users.index');
        }
    }

    public function delete(User $user)
    {
        try {
            if ($user->delete()) {
                Alert::success('Success', 'Data Has Successfully Deleted');
                return redirect()->route('admin.users.index');
            } else {
                Alert::error('Error', 'Data Has Failed Deleted');
                return redirect()->route('admin.users.index');
            }
        } catch (\Throwable $th) {
            Log::error("Error Delete Users: " . $th);
            Alert::error('Error', 'Server Error, Try Again!');
            return redirect()->route('admin.users.index');
        }
    }
}
