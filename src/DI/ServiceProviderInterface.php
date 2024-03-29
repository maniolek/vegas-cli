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
 
namespace Vegas\Cli\DI;

use Phalcon\DiInterface;

/**
 * Interface ServiceProviderInterface
 * @package Vegas\DI
 */
interface ServiceProviderInterface
{
    /**
     * Registers service into Dependency Injector
     *
     * @param DiInterface $di
     * @return mixed
     */
    public function register(DiInterface $di);

    /**
     * Returns array of dependencies
     * <code>
     * return array(
     *      MongoServiceProvider::SERVICE_NAME,
     *      CollectionManagerServiceProvider::SERVICE_NAME
     * );
     * </code>
     *
     * @return array
     */
    public function getDependencies();
}
