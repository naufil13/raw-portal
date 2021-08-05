<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class CertificateEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $subject = 'Certificate';

        return $this->view('email.certificate')
        ->from(trim(env('MAIL_FROM_ADDRESS')),env('MAIL_FROM_NAME'))
        ->subject($subject)
        ->attach(env('APP_URL').'storage/pdf/'.$this->data['attach'], [
             'as' => $this->data['attach'],
             'mime' => 'application/pdf',
        ]);

    }

}
