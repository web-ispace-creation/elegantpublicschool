<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserPasswordResetMail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $link,$email;
    public function __construct($link,$email)
    {
        $this->link = $link;
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
                    ->subject('Password Reset')
                    ->line("The User with {$this->email} has tried tried to reset password. Here is the link!")
                    ->line($this->link)
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
