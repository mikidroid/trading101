<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LotteryWinner extends Notification
{
    use Queueable;
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function via($notifiable)
    {
        return ['database','mail'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Lottery Winner!!!')
            ->line('Congratulations '.$this->data->name.'!!!')
            ->line('You have won $'.$this->data->amount.' in our weekly lottery.')
            ->line('Click the link below to claim you prize.'
            )->action('Notification Action', url('/lottery'))
            ->line('Note: Unclaimed prizes are nullified after 1 week.')
            ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {   
        $subtitle = 'You have won $'.$this->data->amount.' in our weekly lottery.';
        $title = 'Lottery Winner!!!';
        return [
         'name' => $this->data->name,
         'amount' => $this->data->amount,
         'title'=>$title,
         'subtitle'=>$subtitle
        ];
    }
}
