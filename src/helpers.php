<?php

use DingNotice\DingTalk;
use DingNotice\Notice;
use DingNotice\Wechat;

if (!function_exists('ding')) {

    /**
     * @return bool|DingTalk
     * @deprecated
     */
    function ding()
    {

        $arguments = func_get_args();

        $dingTalk = app(DingTalk::class);

        if (empty($arguments)) {
            return $dingTalk;
        }

        if (is_string($arguments[0])) {
            $robot = $arguments[1] ?? 'default';
            return $dingTalk->with($robot)->text($arguments[0]);
        }

    }
}

if (!function_exists('notice')) {

    /**
     * @return bool|DingTalk|Wechat
     */
    function notice($driver = 'dingtalk')
    {
        $class = Notice::driver($driver);
        $notice = app($class);
        return $notice;
    }
}