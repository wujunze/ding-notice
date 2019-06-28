<?php

namespace DingNotice\Messages\DingTalk;

class Link extends Message
{
    protected $messageType = 'link';

    public function __construct($title,$text,$messageUrl,$picUrl = '')
    {
        $this->setMessage($title,$text,$messageUrl,$picUrl);
    }

    public function setMessage($title,$text,$messageUrl,$picUrl = ''){

        $this->makeMessage([
            'text' => $text,
            'title' => $title,
            'picUrl' => $picUrl,
            'messageUrl' => $messageUrl
        ]);
    }
}