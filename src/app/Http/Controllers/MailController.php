<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UserNotification;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function showEmailForm()
    {
        return view('admin.email');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);

        $details = [
            'title' => 'メールの件名',
            'message' => 'メールの本文',
        ];

        Mail::to($user->email)->send(new UserNotification($details));

        return redirect()->back()->with('success', 'メールを送信しました。');
    }
}
