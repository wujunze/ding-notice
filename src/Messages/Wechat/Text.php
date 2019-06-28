<?php


namespace DingNotice\Messages\Wechat;


use DingNotice\Messages\Wechat\Message as BaseMessage;

class Text extends BaseMessage
{
    protected $messageType = 'text';

    public function __construct($content)
    {
        $this->makeMessage([
            'content' => $content
        ]);
    }
}
