<?php
/**
 * @author Sławomir Żytko <slawek@amsterdam-standard.pl>
 * @copyright (c) 2014, Amsterdam Standard
 */

namespace Vegas\Cli\Bootstrap\Initializer;

use Phalcon\Config;
use Vegas\Cli\Bootstrap\Constants;

trait EnvironmentTrait
{

    /**
     * Initializes application environment
     */
    public function initEnvironment(Config $config)
    {
        if (isset($config->application) && isset($config->application->environment)) {
            $env = $config->application->environment;
        } else {
            $env = Constants::DEFAULT_ENV;
        }

        if (!defined('APPLICATION_ENV')) {
            define('APPLICATION_ENV', $env);
        }

        $this->getDI()->set('environment', function() use ($env) {
            return $env;
        }, true);
    }

    /**
     * @return mixed
     */
    abstract public function getDI();
}
