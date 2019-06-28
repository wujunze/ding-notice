<?php


namespace DingNotice;


use DingNotice\Clients\WechatClient;
use DingNotice\Messages\Wechat\Text;

class WechatService extends NoticeService
{

    function setTextMessage($content)
    {
        $this->message = new Text($content);
        return $this;
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
