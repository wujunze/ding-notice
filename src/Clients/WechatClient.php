<?php


namespace DingNotice\Clients;


class WechatClient extends HttpClient
{

    protected $hookUrl = "https://qyapi.weixin.qq.com/cgi-bin/webhook/send";

    /**
     * @return string
     */
    function getRobotUrl()
    {
        return $this->hookUrl ."?key={$this->accessToken}";
    }
}
