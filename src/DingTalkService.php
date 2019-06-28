<?php

namespace DingNotice;

use DingNotice\Clients\DingTalkClient;
use DingNotice\Clients\HttpClient;
use DingNotice\Messages\DingTalk\ActionCard;
use DingNotice\Messages\DingTalk\FeedCard;
use DingNotice\Messages\DingTalk\Link;
use DingNotice\Messages\DingTalk\Markdown;
use DingNotice\Messages\DingTalk\Message;
use DingNotice\Messages\DingTalk\Text;

class DingTalkService extends NoticeService
{

    /**
     * @var Message
     */
    protected $message;


    /**
     * @param Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function getMessage()
    {
        return $this->message->getMessage();
    }

    /**
     * @param array $mobiles
     * @param bool $atAll
     */
    public function setAt($mobiles = [], $atAll = false)
    {
        $this->mobiles = $mobiles;
        $this->atAll = $atAll;
        if ($this->message) {
            $this->message->sendAt($mobiles, $atAll);
        }
    }


    /**
     * @param $content
     * @return $this
     */
    public function setTextMessage($content)
    {
        $this->message = new Text($content);
        $this->message->sendAt($this->mobiles, $this->atAll);
        return $this;
    }

    /**
     * @param $title
     * @param $text
     * @param $messageUrl
     * @param string $picUrl
     * @return $this
     */
    public function setLinkMessage($title, $text, $messageUrl, $picUrl = '')
    {
        $this->message = new Link($title, $text, $messageUrl, $picUrl);
        $this->message->sendAt($this->mobiles, $this->atAll);
        return $this;
    }

    /**
     * @param $title
     * @param $text
     * @return $this
     */
    public function setMarkdownMessage($title, $markdown)
    {
        $this->message = new Markdown($title, $markdown);
        $this->message->sendAt($this->mobiles, $this->atAll);
        return $this;
    }


    /**
     * @param $title
     * @param $text
     * @param int $hideAvatar
     * @param int $btnOrientation
     * @return ActionCard|Message
     */
    public function setActionCardMessage($title, $markdown, $hideAvatar = 0, $btnOrientation = 0)
    {
        $this->message = new ActionCard($this, $title, $markdown, $hideAvatar, $btnOrientation);
        $this->message->sendAt($this->mobiles, $this->atAll);
        return $this->message;
    }

    /**
     * @return FeedCard|Message
     */
    public function setFeedCardMessage()
    {
        $this->message = new FeedCard($this);
        $this->message->sendAt($this->mobiles, $this->atAll);
        return $this->message;
    }

    /**
     * create a guzzle client
     * @return HttpClient
     * @author wangju 2019-05-17 20:25
     */
    protected function createClient($config)
    {
        $client = new DingTalkClient($config);
        return $client;
    }
}
