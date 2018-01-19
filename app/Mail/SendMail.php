<?php

namespace App\Mail;

use App\Model\Subscriber;
use App\Model\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Template $template)
    {
        $this->template = $template;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail')
            ->with([
                'template' => $this->template
            ]);

    }
}
