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
use Phalcon\Loader;

trait LoaderTrait
{

    /**
     * Initializes loader
     * Registers library and plugin directory
     */
    public function initLoader(Config $config)
    {
        $loader = new Loader();
        $loader->registerDirs(
            [
                $config->application->libraryDir,
                $config->application->pluginDir,
                $config->application->taskDir
            ]
        )->register();
    }
}
