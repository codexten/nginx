<?php
/**
 * HiDev plugin for NGINX
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

return [
    'components' => [
        'nginx' => [
            'class' => \codexten\nginx\components\Nginx::class,
        ],
    ],
];
