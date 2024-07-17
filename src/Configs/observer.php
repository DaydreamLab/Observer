<?php

return [
    'record_unique_visitors' => true,

    'record_global_search' => false,

    'ignore_uri' => [
    ],

    'cdn_ip' => env('CDN_IP', 'HTTP_AKAMAI_ORIGIN_HOP'),
];
