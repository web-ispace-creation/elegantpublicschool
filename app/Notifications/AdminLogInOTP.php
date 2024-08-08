<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminLogInOTP extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $otp,$email;
    public function __construct($otp,$email)
    {
        $this->otp = $otp;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->from('web.ispaceceration@gmail.com', 'Elegant Public School')
                    ->subject('Admin Verification')
                    ->line("The Admin With {$this->email} has tried Logging In. Here is the One-Time-Password!")
                    ->line($this->otp)
                    ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
