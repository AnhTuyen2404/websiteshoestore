<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
     public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('client.resetpassword');
    }
    public function toMail($notifiable)
{
    return (new MailMessage)
        ->line('You are receiving this email because we received a password reset request for your account.')
        ->action('Reset Password', url('reset-password/?token=' . $this->data['token']))
        ->line('If you did not request a password reset, no further action is required.');
}
}
