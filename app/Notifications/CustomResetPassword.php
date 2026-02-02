<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class CustomResetPassword extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toes(MailMessage $mail)
    {
        return $mail;
    }

    public function toMail($notifiable)
    {
        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);

        // Save OTP to the user's record
        $notifiable->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(15), // OTP expires in 15 mins
        ]);

        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->view('emails.password-reset', [
                'url' => $url,
                'name' => $notifiable->name,
                'token' => $this->token,
                'otp' => $otp
            ]);
    }
}
