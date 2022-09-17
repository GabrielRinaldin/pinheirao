<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BillCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $billPdf;
    public $bill;
    public $user;

    public function __construct($billPdf, $bill,$user)
    {
        $this->billPdf = $billPdf;
        $this->bill = $bill;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('bill.mail')
            ->subject('Contato')
            ->attach($this->billPdf);
    }
}
