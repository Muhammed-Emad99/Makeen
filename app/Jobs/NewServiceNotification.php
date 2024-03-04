<?php

namespace App\Jobs;

use App\Models\Service;
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

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function handle()
    {


        $subscribes = Subscribe::all(); // Assuming you have an 'is_subscribed' column
        $data = [
            'message' => 'مرحبا، لدينا خدمات جديدة اسم:' . $this->service->name_en . '   ' .  'تحقق منها!',
            'link' => url('site/service/' . $this->service->id),
        ];
        $newServiceAlert = new NewServiceAlert($this->service, $data);

        foreach ($subscribes as $subscribe) {
            Mail::to($subscribe->email)->send($newServiceAlert);
        }
    }
}
