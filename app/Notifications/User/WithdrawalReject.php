<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalReject extends Notification
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
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
            ->subject('Withdrawal Rejected!')
            ->line('Your withdrawal of $'.$this->data->amount.'has been rejected by the admin.')
            ->line('Ref: '.$this->data->ref.'')
            ->line('Requested funds have been returned to your main balance.')
            ->line('Contact us for more information about the failed withdrawal.'
            )->action('Contact', url('mailto:'.env("MAIL_ADDRESS").''))
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
        $title = 'Withdrawal rejected!';
        $subtitle = "Your withdrawal request of $".$this->data->amount." was rejected by the admin. ";
        return [
         'name' => $this->data->name,
         'amount' => $this->data->amount,
         'title'=>$title,
         'subtitle'=>$subtitle
        ];
    }
}
