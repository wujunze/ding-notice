<?php


namespace DingNotice;


use DingNotice\Exceptions\NoticeDriverNotFond;

class Notice
{
    protected static $driverMapper = [
        'dingtalk' => DingTalk::class,
        'wechat' => Wechat::class,
    ];


    public static function driver($driver)
    {
        $class = self::$driverMapper[$driver];
        if (empty($class)) {
            throw new NoticeDriverNotFond();
        }
        return $class;
    }
}