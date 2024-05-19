<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class MedicalFormEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_data;

    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
    }

    public function build()
    {
        return $this->from($this->mail_data['fromEmail'], $this->mail_data['fromName'])
                    ->subject($this->mail_data['subject'])
                    ->view('email-template')
                    ->attachData($this->mail_data['fileData'], $this->mail_data['fileName'], [
                        'mime' => 'application/pdf',
                    ]);
    }
}
