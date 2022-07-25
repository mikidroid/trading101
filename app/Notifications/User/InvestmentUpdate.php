<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentUpdate extends Notification implements ShouldQueue
{
    use Queueable;
    public $data;
    public $profit;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data,$profit)
    {
        $this->data = $data;
        $this->profit = $profit;
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
                    ->subject('You made profit!')
                    ->line("$d->name, you just made profit of $this->profit on your current investment plan")
                    ->line("Expect full returns after your investment is conplete.")
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
        $title = 'Investment Update';
        $subtitle = 'You made profit of $'.$this->profit.'.';
         return [
         'name' => $this->data->name,
         'amount' => $this->profit,
         'title'=>$title,
         'subtitle'=>$subtitle
        ];
    }
}
