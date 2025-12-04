<?php

namespace App\Jobs;

use App\Mail\SignUpEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SignUpJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new SignUpEmail($this->user);
        Mail::to('magjcd@gmail.com')->send($email);
    }
}
