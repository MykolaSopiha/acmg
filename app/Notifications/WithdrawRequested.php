<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WithdrawRequested extends Notification
{
    use Queueable;

    protected $withdraw;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($withdraw)
    {
        $this->withdraw = $withdraw;
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
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->withdraw->id,
            'user_id' => $this->withdraw->wallet->user->id,
            'user_name' => $this->withdraw->wallet->user->name,
            'amount' => $this->withdraw->amount,
            'currency' => $this->withdraw->wallet->currency->code,
            'time' => time(),
        ];
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
            //
        ];
    }
}
