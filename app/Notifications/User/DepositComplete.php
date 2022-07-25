<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepositComplete extends Notification implements ShouldQueue
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
            ->subject('Deposit Confirmed!')
            ->line('Your payment of $'.$this->data->amount.'has been confirmed.')
            ->line('Invoice number: '.$this->data->ref.'')
            ->line('$'.$this->data->amount.' has been added to your main balence, check your balance by clicking the link below.'
            )->action('Check', url('/home'))
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
        $title = 'Deposit confirmed';
        $subtitle = 'You have completed a payment of $'.$this->data->amount.'.';
        return [
         'name' => $this->data->name,
         'amount' => $this->data->amount,
         'title'=>$title,
         'subtitle'=>$subtitle
        ];
    }
}
