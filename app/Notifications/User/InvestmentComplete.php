<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentComplete extends Notification
{
    use Queueable;
    public $data;
    public $total_profit;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data,$sum)
    {
        $this->data = $data;
        $this->total_profit = $sum;
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
      $d = $this->data;
       return (new MailMessage)
                    ->subject('Investment complete!')
                    ->line("Congrats $d->name, your investment is complete and your total interest of $this->total_profit has been added to your main balance.")
                    ->line("$d->interest was removed from your profit balance in this process.")
                    ->line("Check investment status by clicking the button below")
                    ->action('Check', url('/investment'))
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
        $title = 'Investment Complete';
        $subtitle = "$this->total_profit has been added to your main balance";
         return [
         'name' => $this->data->name,
         'amount' => $this->total_profit,
         'title'=>$title,
         'subtitle'=>$subtitle
        ];
    }
}
