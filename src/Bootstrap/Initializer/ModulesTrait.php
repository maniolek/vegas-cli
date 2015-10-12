<?php
/**
 * This file is part of Vegas package
 *
 * @author Slawomir Zytko <slawek@amsterdam-standard.pl>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage http://vegas-cmf.github.io
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vegas\Cli\Bootstrap\Initializer;

use Phalcon\Config;
use Vegas\Cli\Bootstrap\Constants;
use Vegas\Cli\Module\Exception\InvalidModulesListException;
use Vegas\Cli\Module\Loader as ModuleLoader;

trait ModulesTrait
{
    /**
     * Initializes application modules
     */
    public function initModules(Config $config)
    {
        $moduleLoader = new ModuleLoader($this->getDI());
        //registers modules defined in modules.php file
        $modulesFile = $config->application->configDir
            . ModuleLoader::MODULE_STATIC_FILE;
        /**
         * For non-default environment modules are being dumped in each application start
         */
        if (!file_exists($modulesFile) || $this->getDI()->get('environment') != Constants::DEFAULT_ENV) {
            $modules = $moduleLoader->dump(
                $config->application->moduleDir,
                $config->application->configDir
            );
        } else {
            $modules = require $modulesFile;
        }
        if (!is_array($modules)) {
            throw new InvalidModulesListException();
        }
        $this->getApplication()->registerModules($modules);

        //prepares modules configurations
        foreach ($this->getApplication()->getModules() as $module) {
            $moduleConfigFile = dirname($module['path'])
                . DIRECTORY_SEPARATOR
                . 'config'
                . DIRECTORY_SEPARATOR
                . 'config.php';
            if (file_exists($moduleConfigFile)) {
                $moduleConfig = require $moduleConfigFile;
                if (is_array($moduleConfig)) {
                    $moduleConfig = new \Phalcon\Config($moduleConfig);
                    $config->merge($moduleConfig);
                }
            }
        }

        $this->getDI()->set('modules', function() {
            return $this->getApplication()->getModules();
        });
    }

    /**
     * @return mixed
     */
    abstract public function getDI();

    /**
     * @return mixed
     */
    abstract public function getApplication();
}
