<?php


namespace DingNotice\Messages\Wechat;

use \DingNotice\Messages\Message as BaseMessage;

class Message extends BaseMessage
{

    protected function makeAt($users = [], $mobiles = [], $atAll = false)
    {
        if ($atAll){
            $users[] = "@all";
            $mobiles = "@all";
        }
        return [
            'mentioned_list' => $users,
            'mentioned_mobile_list' => $mobiles
        ];
    }

    public function sendAt($users = [], $mobiles = [], $atAll = false)
    {
        $this->at = $this->makeAt($users, $mobiles, $atAll);
        return $this;
    }
}
