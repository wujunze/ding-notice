<?php


namespace DingNotice\Tests\Feature;


use DingNotice\Tests\TestCase;

class NewsTest extends TestCase
{

    protected $messageUrl = "https://mp.weixin.qq.com/s?__biz=MzA4NjMwMTA2Ng==&mid=2650316842&idx=1&sn=60da3ea2b29f1dcc43a7c8e4a7c97a16&scene=2&srcid=09189AnRJEdIiWVaKltFzNTw&from=timeline&isappinstalled=0&key=&ascene=2&uin=&devicetype=android-23&version=26031933&nettype=WIFI";
    protected $picUrl = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1558250973191&di=74a6bd8e0bef94e8e18aab9035016d6e&imgtype=0&src=http%3A%2F%2Fb-ssl.duitang.com%2Fuploads%2Fitem%2F20182%2F21%2F2018221142159_MZ33z.jpeg";
    protected $desc = '今年中秋节公司有豪礼相送';

    public function test_push_news_message(){
        $result =$this->wechat
            ->news()
            ->addArticles('时代的火车向前开', $this->messageUrl, $this->desc, $this->picUrl)
            ->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ],$result);
    }
}