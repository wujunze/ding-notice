<?php

return [
    
    'default' => 'dingtalk',

    'dingtalk' => [
        // 默认发送的机器人
        'default' => [
            // 是否要开启机器人，关闭则不再发送消息
            'enabled' => env('DING_ENABLED',true),
            // 机器人的access_token
            'token' => env('DING_TOKEN',''),
            // 钉钉请求的超时时间
            'timeout' => env('DING_TIME_OUT',2.0),
            'ssl_verify' => env('DING_SSL_VERIFY',true)
        ],

        'other' => [
            'enabled' => env('OTHER_DING_ENABLED',true),

            'token' => env('OTHER_DING_TOKEN',''),

            'timeout' => env('OTHER_DING_TIME_OUT',2.0),

            'ssl_verify' => env('DING_SSL_VERIFY',true)
        ]
    ],
    'wechat' => [
        // 默认发送的机器人
        'default' => [
            // 是否要开启机器人，关闭则不再发送消息
            'enabled' => env('WE_ENABLED',true),
            // 机器人的access_token
            'token' => env('WE_TOKEN',''),
            // 钉钉请求的超时时间
            'timeout' => env('WE_TIME_OUT',2.0),
            'ssl_verify' => env('WE_SSL_VERIFY',true)
        ],

        'other' => [
            'enabled' => env('OTHER_WE_ENABLED',true),

            'token' => env('OTHER_WE_TOKEN',''),

            'timeout' => env('OTHER_WE_TIME_OUT',2.0),

            'ssl_verify' => env('DING_SSL_VERIFY',true)
        ]
    ]

];