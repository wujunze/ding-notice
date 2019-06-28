<?php

namespace DingNotice\Messages\DingTalk;

class Text extends Message
{
    protected $messageType = 'text';

    public function __construct($content)
    {
        $this->makeMessage([
            'content' => $content
        ]);
    }
}