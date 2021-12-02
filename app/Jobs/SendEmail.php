<?php

namespace App\Jobs;

use App\Mail\TestMail;
use App\Models\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $subject;
    public $body;
    public $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $body, $email)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Allow only 2 emails every 1 second
        Redis::throttle('mail')->allow(2)->every(1)->then(function () {

            $recipient = 'fedorchak01@gmail.com';
            Mail::to($this->email)->send(new TestMail($this->subject, $this->body));
            Log::info('Emailed order ' . $this->subject);

        }, function () {
            // Could not obtain lock; this job will be re-queued
            return $this->release(2);
        });
    }
}
