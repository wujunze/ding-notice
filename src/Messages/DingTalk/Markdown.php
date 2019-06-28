<?php

namespace DingNotice\Messages\DingTalk;

class Markdown extends Message
{

    protected $messageType = 'markdown';

    public function __construct($title,$markdown)
    {
        $this->setMessage($title,$markdown);
    }

    public function setMessage($title, $markdown)
    {
        $this->makeMessage([
            'title' => $title,
            'text' => $markdown
        ]);
    }

}