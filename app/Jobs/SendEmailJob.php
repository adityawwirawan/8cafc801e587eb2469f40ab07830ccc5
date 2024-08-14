<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $emailData = $this->emailData;


        Mail::html([],  function ($message) use ($emailData) {
            $message->to($emailData['recipient'])
                    ->subject($emailData['subject'])
                    ->text($emailData['body']);
        });

        // Update the email status in the database
        $this->email->update(['status' => 'sent']);
    }
}
