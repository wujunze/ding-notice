<?php

namespace DingNotice\Tests\Feature;

use DingNotice\SendClient;
use DingNotice\Tests\TestCase;


class TextTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->setUp();
    }

    /**
     * available content to set
     * @param $content
     * @return bool
     * @author wangju 2019-05-17 21:50
     */
    protected function matchContent($content)
    {
        $text = $content['content'];
        return !empty($text);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_push_ding_talk_message()
    {
        $result =$this->ding->text("我就是我,@{$this->testUser} 是不一样的烟火");
        $this->assertSame([
            'errmsg' => 'ok',
            'errcode' => 0
        ],$result);
    }

    public function test_push_ding_talk_text_message_at_all_user(){
        $result =$this->ding
            ->at([],true)
            ->text("我就是我,@{$this->testUser} 是不一样的烟火");
        $this->assertSame([
            'errmsg' => 'ok',
            'errcode' => 0
        ],$result);
    }

    public function test_push_wechat_message(){
        $result = $this->wechat
            ->text('hello world');
    }

    public function test_push_wechat_message_at_all_user(){
        $result = $this->wechat
            ->at([],[],true)
            ->text('hello world');
        print_r($result);
    }
}
