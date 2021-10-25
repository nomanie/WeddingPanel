<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class galleryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @param $details
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('Dodano materiały do wesela: ' . $this->details->bride_first_name . " i " . $this->details->groom_first_name)->from(env('MAIL_FROM_ADDRESS'))
            ->view('emails.galleryNotification')->with("data", $this->details);
    }
}
