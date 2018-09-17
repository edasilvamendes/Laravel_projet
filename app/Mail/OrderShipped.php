<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
    */

    public function __construct($email, $description)
    {
        $this->email = $email;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->from(['address' => 'personne@gmail.com'])
            ->subject('Contact Laravel Project')
            ->view('emails.contact', ['email' => $this->email , 'description' => $this->description]);
    }

}
