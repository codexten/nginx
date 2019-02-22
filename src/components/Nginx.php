<?php
/**
 * Created by PhpStorm.
 * User: jomon
 * Date: 27/11/18
 * Time: 9:25 PM
 */

namespace codexten\nginx\components;


use hidev\base\File;
use ReflectionClass;
use Yii;

class Nginx extends \hidev\nginx\components\Nginx
{
    public $defaultClass = Vhost::class;

    public function dump()
    {
        foreach ($this->getItems() as $vhost) {
            $conf = $vhost->renderConf();
            File::plain($vhost->getDomain() . '.conf')->save($conf);
        }
    }


    public function deploy()
    {
        $etcDir = $this->getEtcDir();
        foreach ($this->getItems() as $vhost) {
            /* @var $vhost Vhost */
            $conf = $vhost->renderConf();
            if (!$vhost->getDomain()) {
                Yii::warning('no domain name to put config');
                continue;
            }
            Yii::$app->hosts->add($vhost->getDomain());
            $name = $vhost->getDomain() . '.conf';
            $file = File::plain($etcDir . DIRECTORY_SEPARATOR . $name);
            $file->save($conf);
        }
    }

    public function findEtcDir()
    {
        return '/cpanel/docker/nginx/sites-available';
    }

    public function getViewPath()
    {
        $ref = new ReflectionClass($this);

        return dirname(dirname($ref->getFileName())) . '/views';
    }
}