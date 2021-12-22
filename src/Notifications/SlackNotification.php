<?php

namespace Jdlx\Slack\Notifications;

use Jdlx\Slack\Sender;
use Jdlx\Slack\Slack;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class SlackNotification extends Notification
{
    use Queueable;

    protected $message;

    /**
     * @var Sender
     */
    protected $from;

    /**
     * @var array
     */
    protected $attachments;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, Sender $from = null, $attachments = null)
    {
        $this->message = $message;
        $this->from = $from ?? Sender::persona(Sender::DEFAULT);
        $this->attachments = $attachments ?? [];
        if (!is_array($this->attachments)) {
            $this->attachments = [$this->attachments];
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return ['slack'];
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toSlack($notifiable)
    {

        $message = new SlackMessage();
        $message->from($this->from->name, $this->from->icon)
            ->content($this->message);

        if ($notifiable instanceof Slack) {
            $message->to("#{$notifiable->channel}");
        }

        foreach ($this->attachments as $attachment) {
            $message->attachments[] = $attachment;
        }

        return $message;
    }
}
