<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CampaignEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $subject = 'Campaign Update';

        return $this->view('email.campaign')->from(trim(env('MAIL_FROM_ADDRESS')),env('MAIL_FROM_NAME'))->subject($subject)
                    ->with([ 'test_message' => $this->data ]);
    }
}
