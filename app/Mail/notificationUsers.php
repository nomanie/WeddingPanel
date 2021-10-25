<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notificationUsers extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->details = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Formularz weselny: '. $this->details->id)->from(env('MAIL_FROM_ADDRESS'))
            ->view('emails.notificationUsers')->with("data",$this->details);
    }
}
