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
    public $data;

    public function __construct(Service $service, $data)
    {
        $this->service = $service;
        $this->data = $data;
    }

    public function build()
    {
        return $this->markdown('mail.new-service-alert')
            ->with(['data' => $this->data, 'service' => $this->service]);
    }
}
