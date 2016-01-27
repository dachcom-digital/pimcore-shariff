<?php

namespace Shariff;

use Pimcore\API\Plugin as PluginLib;

class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface {

    public function preDispatch($e) {

        $e->getTarget()->registerPlugin(new Controller\Plugin\Frontend());

    }

    public function init() {

        parent::init();

    }

    public static function needsReloadAfterInstall() {
        return false;
    }

	public static function install (){

        if( !self::hasToolBoxPlugin()) {
            return 'Shariff needs the ToolBox Plugin.';

        }

        return 'Shariff has been installed successfully.';

	}
	
	public static function uninstall (){

        return true;

	}

	public static function isInstalled () {

        return self::hasToolBoxPlugin();

	}

    /**
     * @fixme!
     * @return bool
     */
    private static function hasToolBoxPlugin() {

        return true;

    }
}
