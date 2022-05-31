<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $message;

    public function __construct($request)
    {
        $this->message = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $text = $this->message;
        
        return $this->subject($this->message->subject)->view('frontend.contact.contact_us_email',compact('text'));
    }
}
