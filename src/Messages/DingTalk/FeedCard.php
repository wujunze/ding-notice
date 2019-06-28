<?php

namespace DingNotice\Messages\DingTalk;

use DingNotice\DingTalkService;

class FeedCard extends Message
{
    protected $service;

    protected $messageType = 'feedCard';

    public function __construct(DingTalkService $service)
    {
        $this->service = $service;
        $this->setMessage();

    }

    public function setMessage(){
        $this->makeMessage([
            'links' => []
        ]);
    }

    public function addLinks($title,$messageUrl,$picUrl){
        $this->message[$this->messageType]['links'][] = [
            'title' => $title,
            'messageURL' => $messageUrl,
            'picURL' => $picUrl
        ];
        return $this;
    }

    public function send(){
        $this->service->setMessage($this);
        return $this->service->send();
    }

}