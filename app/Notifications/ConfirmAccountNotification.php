<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmAccountNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public $token)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to Crossfire Tournaments!')
            ->line('You are receiving this email because you signed up to a crossfire tournament.')
            ->line('This email will give you access to your account and the dashboard where you can manage your team.')
            ->action('Complete signup', url('confirm/account', $this->token))
            ->line('Ps. If you do not complete this step, you will still not be able to join the tournament.');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
