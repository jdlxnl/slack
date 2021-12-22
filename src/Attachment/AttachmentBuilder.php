<?php

namespace Jdlx\Slack\Attachment;

use Illuminate\Notifications\Messages\SlackAttachment;

abstract class AttachmentBuilder
{
    protected $title;

    protected $fields = [];

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function setField($name, $value)
    {
        $this->fields[$name] = $value;
        return $this;
    }

    /**
     * Create the slack attachment
     *
     * @return SlackAttachment
     */
    public function toSlackAttachment()
    {
        $att = new SlackAttachment();
        $att->fields($this->fields);

        if ($this->title) {
            $att->title($this->title);
        }

        return $att;
    }
}
