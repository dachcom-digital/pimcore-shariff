<?php

use Heise\Shariff\Backend;
use Zend\Config\Reader\Json;

class Shariff_ProxyController extends \Pimcore\Controller\Action\Admin
{
    /**
     *
     */
    public function listenAction()
    {
        header('Content-type: application/json');

        $url = $this->getParam('url');

        if (empty($url)) {
            echo json_encode(NULL);
            exit;
        }

        $configFile = \Pimcore\Config::locateConfigFile('shariff.php');

        if (is_file($configFile)) {
            $confArray = include($configFile);
        } else {
            $reader = new Json();
            $confArray = $reader->fromFile(PIMCORE_PLUGINS_PATH . '/Shariff/config/shariff.json');
        }

        $shariff = new Backend($confArray);
        echo json_encode($shariff->get($url));

        exit;
    }

}
