<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use App\Models\Email;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string',
            'body' => 'required|string',
        ]);

        $email = Email::create([
            'recipient' => $validated['recipient'],
            'subject' => $validated['subject'],
            'body' => $validated['body'],
            'status' => 'pending',
        ]);

        SendEmailJob::dispatch($email);

        return response()->json(['message' => 'Email is being processed.']);
    }
}
