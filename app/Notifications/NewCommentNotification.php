<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification
{
    use Queueable;

    protected $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // mail: Send email message notification - toMail
        // database: Store notification in the database - toDatabase
        // broadcast: Send real-time (push) notifications - toBroadcast
        // vonage: Send SMS notification by Vonage Platform - toVonage
        // slack: Send message to a Slack channel - toSlack

        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $name = $this->comment->name;
        $post = $this->comment->post->title;

        return (new MailMessage)
                    ->subject('New Comment')
                    ->greeting("Hi {$notifiable->name},")
                    ->line("$name added a new comment on your post $post.")
                    ->action('View Comment', route('posts.show', $this->comment->post->slug))
                    ->line('Thank you for using our blog!');
    }

    public function toDatabase($notifiable)
    {
        $name = $this->comment->name;
        $post = $this->comment->post->title;

        return [
            'title' => 'New Comment',
            'body' => "$name added a new comment on your post $post.",
            'image' => '<span class="fas fa-comment"></span>',
            'link' => route('posts.show', $this->comment->post->slug),
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
