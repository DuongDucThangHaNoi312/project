<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

    class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $bills;
    public $datas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bills,$datas)
    {
        $this->bills =  $bills;
        $this->datas =  $datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thông báo đặt hàng')->view('emails.email');
    }
}
