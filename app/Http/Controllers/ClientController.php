<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client' => 'required|max:255|unique:clients,client',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('create', true);
        }

        $data = $validator->validated();
        if (Client::create($data)) {
            Alert::success('Success', 'Data Has Successfully Saved');
            return redirect()->route('admin.clients.index');
        } else {
            Alert::error('Error', 'Data Has Failed Saved');
            return redirect()->route('admin.clients.index');
        }
    }

    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), [
            'client' => 'required|max:255|unique:clients,client,' . $client->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('edit', true);
        }

        $data = $validator->validated();


        if ($client->update($data)) {
            Alert::success('Success', 'Data Has Successfully Updated');
            return redirect()->route('admin.clients.index');
        } else {
            Alert::error('Error', 'Data Has Failed Updated');
            return redirect()->route('admin.clients.index');
        }
    }

    public function delete(Client $client)
    {
        try {
            if ($client->delete()) {
                Alert::success('Success', 'Data Has Successfully Deleted');
                return redirect()->route('admin.clients.index');
            } else {
                Alert::error('Error', 'Data Has Failed Deleted');
                return redirect()->route('admin.clients.index');
            }
        } catch (\Throwable $th) {
            Log::error("Error Delete Clients: " . $th);
            Alert::error('Error', 'Server Error, Try Again!');
            return redirect()->route('admin.clients.index');
        }
    }
}
