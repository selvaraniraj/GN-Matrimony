<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberDetailSendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $password;
    public $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$password,$otp)
    {
        $this->user = $user;
        $this->password = $password;
        $this->otp = $otp;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Matrimony Login Credential and OTP')
        ->view('mails.membersDetailsSend');
    }
}
