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

        $renderer = \Zend_Controller_Action_HelperBroker::getExistingHelper('ViewRenderer');
        $renderer->initView();

        $renderer->view->footFile()->appendScript('plugin-shariff', '/website/static/js/vendor/shariff/shariff.min.js');
        $renderer->view->footFile()->appendStylesheet('plugin-shariff-css', '/website/static/js/vendor/shariff/shariff.min.css');

        $this->initialized = true;

    }

}

