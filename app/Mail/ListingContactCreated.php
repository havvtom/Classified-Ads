<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Listing;

class ListingContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;

    public $listing;

    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $sender, Listing $listing, $message)
    {
        $this->sender = $sender;

        $this->listing = $listing;

        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')
                    ->subject("{$this->sender->name} sent a message about {$this->listing->title}");
    }
}
