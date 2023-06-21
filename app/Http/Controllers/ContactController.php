<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function saveMessage() {
        $message = new Message();
        $message->name = request('name');
        $message->email = request('email');
        $message->message = request('message');
        $message->save();
        return redirect(route('kontakt'));
    }

    public function allMessages() {
        return view('admin-pages.all-messages', [
            'read_messages' => Message::where('read_status', '=', 1)->get(),
            'unread_messages' => Message::where('read_status', '=', 0)->get(),
            'title' => 'All messages',
        ]);
    }

    public function changeStatus($id) {
        $message = Message::find($id);
        $message->read_status = 1;
        $message->save();
        return redirect(route('svePoruke'));
    }

    public function deleteMessage($id) {
        $message = Message::find($id);
        $message->delete();
        return redirect(route('svePoruke'));
    }
};
