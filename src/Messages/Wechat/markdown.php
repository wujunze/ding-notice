<?php


namespace DingNotice\Messages\Wechat;

use DingNotice\Messages\Wechat\Message as BaseMessage;

class markdown extends BaseMessage
{
    protected $messageType = 'markdown';

    public function __construct($markdown)
    {
        $this->setMessage($markdown);
    }

    public function setMessage($markdown)
    {
        $this->makeMessage([
            'content' => $markdown
        ]);
    }
}
