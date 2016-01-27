<?php

namespace Shariff;

use Pimcore\API\Plugin as PluginLib;

class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface {

    public function preDispatch($e) {

        $e->getTarget()->registerPlugin(new Controller\Plugin\Frontend());

    }

    public function init() {

        parent::init();

        \Pimcore::getEventManager()->attach("system.startup", function (\Zend_EventManager_Event $e) {

            $autoLoader = \Zend_Loader_Autoloader::getInstance();

            $autoLoader->registerNamespace('Heise');

            $includePaths = array(
                get_include_path(),
                PIMCORE_PLUGINS_PATH . '/Shariff/lib/Heise',
            );

            set_include_path(implode(PATH_SEPARATOR, $includePaths) . PATH_SEPARATOR);


        });

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

    private static function hasToolBoxPlugin() {

        return true;

    }
}
