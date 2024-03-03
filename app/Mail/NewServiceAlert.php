<?php

namespace App\Mail;

use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewServiceAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $service;
    public $message;

    public function __construct(Service $service, $message)
    {
        $this->service = $service;
        $this->message = $message;
    }

    public function build()
    {
        return $this->markdown('mail.new-service-alert')
            ->with(['message' => $this->message, 'service' => $this->service]);
    }
}
