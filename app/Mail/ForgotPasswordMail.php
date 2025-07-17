<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $apiKey;
    public $wallId;
    public $userId;
    public $sub4;
    public $sub5;
    public $sub6;
    public $newPassword;

    public function __construct(User $user, $apiKey, $wallId, $userId, $sub4, $sub5, $sub6, $newPassword)
    {
        $this->user = $user;
        $this->apiKey = $apiKey;
        $this->wallId = $wallId;
        $this->userId = $userId;
        $this->sub4 = $sub4;
        $this->sub5 = $sub5;
        $this->sub6 = $sub6;
        $this->newPassword = $newPassword;

    }

    public function build()
    {
        return $this->subject('Forgot Password Mail.')
                    ->view('email.forgot-password')
                    ->with([
                        'user' => $this->user,
                        'apiKey' => $this->apiKey,
                        'wallId' => $this->wallId,
                        'userId' => $this->userId,
                        'sub4' => $this->sub4,
                        'sub5' => $this->sub5,
                        'sub6' => $this->sub6,
                        "newPassword" => $this->newPassword
                    ]);
    }
}
