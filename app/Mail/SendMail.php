<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $name)
    {
        $this->data = $data;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

      return $this->from($this->data['from'])
                  ->subject($this->data['assunto'])
                  ->markdown('admin.emails.email_template')
                  ->with('nome', $this->name)
                  ->with('mensagem', $this->data['mensagem']);
    }
}
