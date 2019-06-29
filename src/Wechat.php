<?php


namespace DingNotice;

use DingNotice\Clients\SendClient;
use DingNotice\Messages\Wechat\News;

class Wechat
{
    /**
     * @var
     */
    protected $config;

    /**
     * @var string
     */
    protected $robot = 'default';

    /**
     * @var WechatService
     */
    protected $service;

    /**
     * @var SendClient|null
     */
    protected $client;


    /**
     * DingTalk constructor.
     * @param $config
     * @param SendClient $client
     */
    public function __construct($config, $client = null)
    {
        $this->config = $config;
        $this->client = $client;
        $this->with();
    }

    /**
     * @param string $robot
     * @return $this
     */
    public function with($robot = 'default')
    {
        $this->robot = $robot;
        $this->service = new WechatService($this->config[$robot], $this->client);
        return $this;
    }


    /**
     * @param string $content
     * @return mixed
     */
    public function text($content = '')
    {
        return $this->service
            ->setTextMessage($content)
            ->send();
    }

    /**
     * @param $url
     * @return mixed
     */
    public function image($url)
    {
        return $this->service
            ->setImageMessage($url)
            ->send();
    }

    /**
     * @param array $mobiles
     * @param bool $atAll
     * @return $this
     */
    public function at($users, $mobiles = [], $atAll = false)
    {
        $this->service
            ->setAt($users, $mobiles, $atAll);
        return $this;
    }

    /**
     * @param $title
     * @param $markdown
     * @return mixed
     */
    public function markdown($markdown)
    {
        return $this->service
            ->setMarkdownMessage($markdown)
            ->send();
    }

    /**
     * @return News
     */
    public function news()
    {
        return $this->service
            ->setNewsMessage();
    }

}
