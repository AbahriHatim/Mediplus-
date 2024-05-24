<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewBillWasWritten extends Notification 
{
    use Queueable;

    protected $patientId;

    /**
     * Create a new notification instance.
     *
     * @param int $patientId
     * @return void
     */
    public function __construct($patientId)
    {
        $this->patientId = $patientId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => (string) Str::uuid(),
            'data' => 'Notification data here',
            'patient_id' => $this->patientId,
            'notifiable_id' => $notifiable->id,
            'notifiable_type' => get_class($notifiable)
        ];
    }
}
