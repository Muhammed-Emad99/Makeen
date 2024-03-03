<?php

namespace App\Jobs;

use App\Models\Subscribe; // Assume this is your User model
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewServiceAlert; // You'll create this Mailable next

class NewServiceNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function handle()
    {
        $subscribes = Subscribe::all(); // Assuming you have an 'is_subscribed' column
        $message = 'مرحبا، لدينا خدمات جديدة اسم:' . $this->service->name_ar . '   ' .  'تحقق منها!';

        foreach ($subscribes as $subscribe) {
            Mail::to($subscribe->email)->send(new NewServiceAlert($message));
        }
    }
}
