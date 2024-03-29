<?php
/**
 * This file is part of Vegas package
 *
 * @author Mateusz Aniołek <mateusz.aniolek@amsterdam-standard.pl>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage http://vegas-cmf.github.io
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */ 

namespace Vegas\Cli\Generator;

use Vegas\Cli\Exception as VegasException;

/**
 * Class Exception
 * @package Vegas\Cli
 */
class Exception extends VegasException
{
    /**
     * Exception default message
     *
     * @var string
     */
    protected $message = 'Cli Generator exception';
}
