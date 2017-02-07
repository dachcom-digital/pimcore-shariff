<?php

namespace Shariff;

use Pimcore\API\Plugin as PluginLib;

class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface
{
    /**
     * @param $e
     */
    public function preDispatch($e)
    {
        $e->getTarget()->registerPlugin(new Controller\Plugin\Frontend());
    }

    /**
     *
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return bool
     */
    public static function needsReloadAfterInstall()
    {
        return FALSE;
    }

    /**
     * @return string
     */
    public static function install()
    {
        if (!self::hasToolBoxPlugin()) {
            return 'Shariff needs the ToolBox Plugin.';
        }

        return 'Shariff has been installed successfully.';
    }

    /**
     * @return bool
     */
    public static function uninstall()
    {
        return TRUE;
    }

    /**
     * @return bool
     */
    public static function isInstalled()
    {
        return self::hasToolBoxPlugin();
    }

    /**
     * @fixme!
     * @return bool
     */
    private static function hasToolBoxPlugin()
    {
        return TRUE;
    }
}
