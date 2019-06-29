<?php


namespace DingNotice\Messages\Wechat;

use DingNotice\Messages\Wechat\Message as BaseMessage;
use DingNotice\WechatService;

class News extends BaseMessage
{
    protected $service;

    protected $messageType = 'news';

    public function __construct(WechatService $service)
    {
        $this->service = $service;
        $this->setMessage();

    }

    public function setMessage()
    {
        $this->makeMessage([
            'articles' => []
        ]);
    }

    public function addArticles($title, $url, $description = '', $picUrl = '')
    {
        $this->message[$this->messageType]['articles'][] = [
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'picurl' => $picUrl
        ];
        return $this;
    }

    public function send()
    {
        $this->service->setMessage($this);
        return $this->service->send();
    }

}
