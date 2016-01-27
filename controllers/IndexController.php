<?php

use Heise\Shariff\Backend;
use Zend\Config\Reader\Json;

class Shariff_IndexController extends \Pimcore\Controller\Action\Admin {
    
    public function indexAction (  ) {

       // header('Content-type: application/json');

        $url =  $this->getParam('url');

        if ( empty( $url ) ) {

            echo json_encode(null);
            return;

        }

        $options = [
            "domain"   => "www.dachcom.com",
            "cache"    => ["ttl" => 1],
            "services" => ["Facebook", "GooglePlus", "LinkedIn", "Reddit", "StumbleUpon", "Flattr", "Pinterest", "AddThis"]
        ];

        $shariff = new Backend($options);
        echo json_encode($shariff->get( $url ));


    }
}
