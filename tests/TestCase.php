<?php

namespace DingNotice\Tests;

use DingNotice\Clients\DingTalkClient;
use DingNotice\DingTalk;
use DingNotice\Wechat;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @var DingTalk
     */
    protected $ding;
    /**
     * @var Wechat
     */
    protected $wechat;

    protected $testUser;

    public function setUp()
    {
        $this->setUpDing();
        $this->setUpWechat();
    }

    protected function setUpDing()
    {
        $token = 'f80be582aafed07cfced271c333c7ba7f46b873ebf7168e570919296b8062bad';
        $this->testUser = '18888888888';

        $robot1['timeout'] = 30.0;
        $robot1['enabled'] = true;
        $robot1['token'] = $token;

        $config['default'] = $robot1;
        $this->ding = $this->mockDingClient($config);
    }


    protected function setUpWechat()
    {
        $token = '6764dbf6-5892-4376-8fb3-8834642b9d7a';
        $this->testUser = '18888888888';

        $robot1['timeout'] = 30.0;
        $robot1['enabled'] = true;
        $robot1['token'] = $token;

        $config['default'] = $robot1;

        $this->wechat = new Wechat($config);
    }

    /**
     * mock ding client
     * @param null $client
     * @return DingTalk
     * @author wangju 2019-05-17 20:53
     */
    protected function mockDingClient($config,$client = null)
    {
        $client = \Mockery::mock(DingTalkClient::class);
        $client->shouldReceive('send')->withArgs(function ($arg) {
            $messageType = $arg['msgtype'];

            if (!in_array($messageType, ['text', 'actionCard', 'feedCard', 'link', 'markdown'])) {
                return false;
            }
            if (!array_key_exists($messageType, $arg)) {
                return false;
            }
            return $this->matchContent($arg[$messageType]);
        })->andReturn([
            'errmsg' => 'ok',
            'errcode' => 0
        ]);
        $ding = new DingTalk($config, $client);
        return $ding;
    }

    protected function matchContent($content)
    {
        return true;
    }

}
