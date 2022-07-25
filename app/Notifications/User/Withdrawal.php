<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Withdrawal extends Notification implements ShouldQueue
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
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
            ->subject('Withdrawal Initiated!')
            ->line('Your withdrawal of $'.$this->data->amount.'is being processed.')
            ->line('Ref: '.$this->data->ref.'')
            ->line('You will be notified shortly after your withdrawal is completed.')
            ->line('You can always check your withdrawal status by clicking the link below.'
            )->action('Check', url('/transactions'))
            ->line('Thank you for using our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $title = 'Withdrawal pending';
        $subtitle = 'You have initiated a withdrawal of $'.$this->data->amount.'.';
        return [
         'name' => $this->data->name,
         'amount' => $this->data->amount,
         'title'=>$title,
         'subtitle'=>$subtitle
        ];
    }
}
