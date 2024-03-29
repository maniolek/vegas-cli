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

namespace Vegas\Cli\Module\Exception;

use Vegas\Cli\Exception as CliException;

/**
 * Class InvalidModulesListException
 * @package Vegas\Mvc\Module\Exception
 */
class InvalidModulesListException extends CliException
{
    protected $message = 'Invalid modules list';
}
