<?php


namespace Jdlx\Slack;


use Illuminate\Notifications\Notifiable;

class Slack
{
    use Notifiable;

    /**
     * The channel the message will be sent to
     * @var String
     */
    public $channel;

    public function __construct($channel = null)
    {
        $this->channel = $channel ?? config('slack.default_channel');
    }

    /**
     * Route notifications for the Slack channel.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return config('slack.webhook');
    }

    /**
     * Create a notifiable object with the given
     * channel as a property.
     *
     * @param $channel // The channel to notification should land in
     * @return Slack
     */
    public static function channel($channel = null)
    {
        return new Slack($channel);
    }
}
