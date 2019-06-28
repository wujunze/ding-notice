<?php


namespace DingNotice\Clients;


class DingTalkClient extends HttpClient
{
    /**
     * @var string
     */
    protected $hookUrl = "https://oapi.dingtalk.com/robot/send";

    /**
     * @return string
     */
    public function getRobotUrl(){
        return $this->hookUrl . "?access_token={$this->accessToken}";
    }
}
