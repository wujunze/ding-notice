<?php

namespace DingNotice\Messages\Wechat;

use DingNotice\Messages\Wechat\Message as BaseMessage;

class Image extends BaseMessage
{
    protected $messageType = 'image';

    public function __construct($url)
    {
        $this->setMessage($url);
    }

    public function setMessage($url)
    {
        $file = file_get_contents($url);
        $this->makeMessage([
            'base64' => base64_encode($file),
            'md5' => md5($file)
        ]);
    }
}
