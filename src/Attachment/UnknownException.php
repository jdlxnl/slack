<?php

namespace Jdlx\Slack\Attachment;

class UnknownException extends AttachmentBuilder
{

    protected $exception;

    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * @return \Illuminate\Notifications\Messages\SlackAttachment
     */
    public function toSlackAttachment(): \Illuminate\Notifications\Messages\SlackAttachment
    {
        $attachment = parent::toSlackAttachment();
        $attachment->content($this->exception->getMessage());
        return $attachment;
    }
}
