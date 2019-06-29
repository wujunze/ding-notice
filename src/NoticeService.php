<?php


namespace DingNotice;

use DingNotice\Clients\HttpClient;
use DingNotice\Clients\SendClient;
use DingNotice\Messages\Message;

abstract class NoticeService
{

    protected $config;

    /**
     * @var SendClient
     */
    protected $client;

    /**
     * @var Message
     */
    protected $message;

    /**
     * @var array
     */
    protected $mobiles = [];
    /**
     * @var bool
     */
    protected $atAll = false;

    /**
     * @var array
     */
    protected $users = [];

    /**
     * @return bool|array
     */
    public function send()
    {
        if (!$this->config['enabled']) {
            return false;
        }
        return $this->client->send($this->message->getBody());
    }


    /**
     * DingTalkService constructor.
     * @param $config
     * @param null $client
     */
    public function __construct($config, SendClient $client = null)
    {
        $this->config = $config;
        $this->setTextMessage('null');

        if ($client != null) {
            $this->client = $client;
            return;
        }
        $this->client = $this->createClient($config);

    }

    /**
     * @param Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }


    abstract protected function createClient($config);


    abstract function setTextMessage($content);
}
