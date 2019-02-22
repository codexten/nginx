<?php
/**
 * HiDev plugin for NGINX
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

namespace codexten\nginx\components;

use hidev\modifiers\Sudo;
use Yii;
use yii\helpers\StringHelper;

class Vhost extends \hidev\nginx\components\Vhost
{
    public function findIps()
    {
        $ips = parent::findIps();
        foreach ($ips as $key => $ip) {
            if (strpos($ip, ':') === false) {
                $ips[$key] = $ip . ':80';
            }
        }

        return $ips;
    }

}
