<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DangerWarning extends Mailable
{
    use Queueable, SerializesModels;
    protected $type;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $type)
    {
        //
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.danger')->with([
            'type' => $this->type,
            'data' => $this->data
        ]);
    }
}
