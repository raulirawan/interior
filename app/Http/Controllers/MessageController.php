<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = $validator->validated();

        if (Message::create($data)) {
            Alert::success('Success', 'Your Message Has Successfully Sent');
            return redirect()->route('contact-us');
        } else {
            Alert::error('Error', 'Your Message Has Failed Sent');
            return redirect()->route('contact-us');
        }
    }

    public function delete(Message $message)
    {
        try {
            if ($message->delete()) {
                Alert::success('Success', 'Data Has Successfully Deleted');
                return redirect()->route('admin.messages.index');
            } else {
                Alert::error('Error', 'Data Has Failed Deleted');
                return redirect()->route('admin.messages.index');
            }
        } catch (\Throwable $th) {
            Log::error("Error Delete Message: " . $th);
            Alert::error('Error', 'Server Error, Try Again!');
            return redirect()->route('admin.messages.index');
        }
    }
}
