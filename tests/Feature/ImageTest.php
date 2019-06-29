<?php


namespace DingNotice\Tests\Feature;


use DingNotice\Tests\TestCase;

class ImageTest extends TestCase
{
    protected $url = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1558250973191&di=74a6bd8e0bef94e8e18aab9035016d6e&imgtype=0&src=http%3A%2F%2Fb-ssl.duitang.com%2Fuploads%2Fitem%2F20182%2F21%2F2018221142159_MZ33z.jpeg';

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_push_wechat_image_message()
    {
        $result =$this->wechat->image($this->url);

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok'
        ],$result);
    }

}