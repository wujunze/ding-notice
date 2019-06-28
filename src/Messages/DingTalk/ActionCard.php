<?php

namespace DingNotice\Messages\DingTalk;

use DingNotice\DingTalkService;

class ActionCard extends Message
{

    protected $messageType = 'actionCard';
    protected $service;

    public function __construct(DingTalkService $service,$title, $markdown, $hideAvatar = 0, $btnOrientation = 0)
    {
        $this->service = $service;
        $this->setMessage($title,$markdown,$hideAvatar,$btnOrientation);
    }

    public function setMessage($title, $markdown, $hideAvatar = 0, $btnOrientation = 0)
    {
        $this->makeMessage([
            'title' => $title,
            'text' => $markdown,
            'hideAvatar' => $hideAvatar,
            'btnOrientation' => $btnOrientation
        ]);
    }

    public function single($title,$url){
        $this->message[$this->messageType]['singleTitle'] = $title;
        $this->message[$this->messageType]['singleURL'] = $url;
        $this->service->setMessage($this);
        return $this;
    }

    public function addButtons($title,$url){
        $this->message[$this->messageType]['btns'][] = [
            'title' => $title,
            'actionURL' => $url
        ];
        return $this;
    }

    public function send(){
        $this->service->setMessage($this);
        return $this->service->send();
    }

}