<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;

class CustomVerifyEmail extends VerifyEmail
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);
        return (new MailMessage)
                    ->subject('【商品雲】新規登録ーメールアドレスの認証')
                    ->greeting('こんにちは、' . $notifiable->email . '様!')
                    ->line('お客様のメールアドレスで【４世代】ショッピングモール【商品雲】に新規登録がされました。')
                    ->line('以下のリンクをクリックして、メールアドレスの認証を完了してください。')
                    ->action('メールアドレスを認証', $verificationUrl)
                    ->line('もしこのメールに心当たりがない場合、他の方がメールアドレスを誤って入力した可能性がございます。')
                    ->line('その場合、このメールを無視していただいて問題ございません。')
                    ->line('ご不明点、ご質問等がある場合は、お気軽に以下の連絡先までお問い合わせください。')
                    ->line('08-0123-4567')
                    ->line('ありがとうございます。')
                    ->line('【４世代】ショッピングモール【商品雲】サポートチーム');
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
