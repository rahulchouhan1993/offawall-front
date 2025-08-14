<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $apiKey;
    public $wallId;
    public $userId;
    public $sub4;
    public $sub5;
    public $sub6;

    public function __construct(User $user, $apiKey, $wallId, $userId, $sub4, $sub5, $sub6)
    {
        $this->user = $user;
        $this->apiKey = $apiKey;
        $this->wallId = $wallId;
        $this->userId = $userId;
        $this->sub4 = $sub4;
        $this->sub5 = $sub5;
        $this->sub6 = $sub6;

    }

    public function build()
    {
        return $this->subject('Please verify your email.')
                    ->view('email.email-verify')
                    ->with([
                        'user' => $this->user,
                        'apiKey' => $this->apiKey,
                        'wallId' => $this->wallId,
                        'userId' => $this->userId,
                        'sub4' => $this->sub4,
                        'sub5' => $this->sub5,
                        'sub6' => $this->sub6,
                    ]);
    }
}
