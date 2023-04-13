<?php

namespace App\Notifications;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SmtpTest extends Notification
{
    use Queueable;

    protected $user = '';
    protected $staus = '';
    protected $exam_name = '';
    protected $percentage = '';
    protected $test_date = '';
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user,$email)
    {
        $this->user = $user;
        $this->email = $email;
        $this->date = date('Y-m-d');
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
         return (new MailMessage)
         ->subject('SMTP Test Email')
         ->to($this->email)
         ->view(
        'system-emails.smtp-test', [   'username'   => $this->user->getUserTitle(),
        'date' => $this->date,
                                                       ]);

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
