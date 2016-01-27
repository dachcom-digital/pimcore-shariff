<?php

namespace Shariff\Controller\Plugin;

class Frontend extends \Zend_Controller_Plugin_Abstract {

    /**
     * @var bool
     */
    protected $initialized = false;

    public function postDispatch() {

        if ($this->initialized) {
            return;
        }

        $view = \Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer')->view;

        $view->footFile()->appendScript('plugin-shariff', '/website/static/js/vendor/shariff/shariff.min.js');
        $view->footFile()->appendStylesheet('plugin-shariff-css', '/website/static/js/vendor/shariff/shariff.min.css');

        $this->initialized = true;

    }

}

