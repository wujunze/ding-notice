<?php


namespace DingNotice\Messages\DingTalk;

use \DingNotice\Messages\Message as BaseMessage;


class Message extends BaseMessage
{
    protected function makeAt($mobiles = [], $atAll = false)
    {
        return [
            'at' => [
                'atMobiles' => $mobiles,
                'isAtAll' => $atAll
            ]
        ];
    }

    public function sendAt($mobiles = [], $atAll = false)
    {
        $this->at = $this->makeAt($mobiles, $atAll);
        return $this;
    }
}
