<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Deposit extends Notification implements ShouldQueue
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
            ->subject('Deposit Invoice')
            ->line('This is an invoice of your required payment of $'.$this->data->amount.'.')
            ->line('Invoice number: '.$this->data->ref.'')
            ->line('After payment completion, check your transaction status anytime by clicking the link below.'
            )->action('Check', url('/transactions'))
            ->line('Note: Payments are confirmed securely and automatically on the blockchain network.')
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
        $title = 'Deposit invoice';
        $subtitle = 'You have a pending deposit of $'.$this->data->amount.'.';
         return [
         'name' => $this->data->name,
         'amount' => $this->data->amount,
         'title'=>$title,
         'subtitle'=>$subtitle
        ];
    }
}
