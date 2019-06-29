<?php


namespace DingNotice\Messages\Wechat;

use \DingNotice\Messages\Message as BaseMessage;

class Message extends BaseMessage
{

    protected function makeAt($users = [], $mobiles = [], $atAll = false)
    {
        if ($atAll){
            $users[] = "@all";
        }
        return [
            'mentioned_list' => array_unique($users),
            'mentioned_mobile_list' =>array_unique($mobiles)
        ];
    }

    public function sendAt($users = [], $mobiles = [], $atAll = false)
    {
        $this->at = $this->makeAt($users, $mobiles, $atAll);
        return $this;
    }
}
