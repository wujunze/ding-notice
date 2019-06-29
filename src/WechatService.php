<?php


namespace DingNotice;


use DingNotice\Clients\WechatClient;
use DingNotice\Messages\Wechat\Image;
use DingNotice\Messages\Wechat\Markdown;
use DingNotice\Messages\Wechat\Message;
use DingNotice\Messages\Wechat\News;
use DingNotice\Messages\Wechat\Text;

class WechatService extends NoticeService
{

    function setTextMessage($content)
    {
        $this->message = new Text($content);
        $this->message->sendAt($this->users,$this->mobiles, $this->atAll);
        return $this;
    }

    /**
     * @param $title
     * @param $text
     * @return $this
     */
    public function setMarkdownMessage($markdown)
    {
        $this->message = new Markdown($markdown);
        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setImageMessage($url)
    {
        $this->message = new Image($url);
        return $this;
    }

    /**
     * @return News|Message
     */
    public function setNewsMessage()
    {
        $this->message = new News($this);
        return $this->message;
    }


    protected function createClient($config)
    {
        return new WechatClient($config);
    }

    /**
     * @param array $mobiles
     * @param bool $atAll
     */
    public function setAt($users, $mobiles = [], $atAll = false)
    {
        $this->mobiles = $mobiles;
        $this->atAll = $atAll;
        $this->users = $users;
        if ($this->message) {
            $this->message->sendAt($users, $mobiles, $atAll);
        }
    }
}
