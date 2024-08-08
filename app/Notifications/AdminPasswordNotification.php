<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *  @param string $verificationUrl
     */
    protected $verificationUrl;
    protected $userName;
    public function __construct($verificationUrl,$userName)
    {
        $this->verificationUrl = $verificationUrl;
        $this->userName = $userName;
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
                    ->subject('New Elegant Admin creation request')
                    ->line("Do you want to accept {$this->userName} as Admin? if Yes press the 'Yes' button else just leave this")
                    ->action('Yes', $this->verificationUrl)
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
