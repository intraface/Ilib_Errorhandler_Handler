<?php
/**
 * Logs an error message
 *
 * PHP Version 5
 *
 * @package   ErrorHandler
 * @author    Lars Olesen <lars@legestue.net>
 * @author    Sune Jensen <sj@sunet.dk>
 * @copyright 2007 Authors
 * @license   GPL http://www.opensource.org/licenses/gpl-license.php
 * @version   @package-version@
 * @link      http://www.sitepoint.com/blogs/2006/08/12/pimpin-harrys-pretty-bluescreen/
 */

/**
 * Logs an error message
 *
 * @package   ErrorHandler
 * @author    Lars Olesen <lars@legestue.net>
 * @author    Sune Jensen <sj@sunet.dk>
 * @copyright 2007 Authors
 * @license   GPL http://www.opensource.org/licenses/gpl-license.php
 * @version   @package-version@
 * @example   examples/trigger_error.php
 * @example   examples/exceptions.php
 * @link      http://www.sitepoint.com/blogs/2006/08/12/pimpin-harrys-pretty-bluescreen/
 */
require_once 'Log.php';

class Ilib_Errorhandler_Handler_File implements Ilib_Errorhandler_Handler
{
    /**
     * @var object
     */
    private $logger;

    /**
     * Constructor
     *
     * @param string error file name
     *
     * @return void
     */
    function __construct($logger)
    {
        $this->logger = $logger;
    }

    /**
     * Write error to log file
     *
     * @param array error details
     *
     * @return void
     */
    public function handle(Exception $e)
    {
        // Possible other pattern for logging filling less lines, probably making it easier to parse.
        if (!empty($_SERVER['REQUEST_URI'])) {
            $request = $_SERVER['REQUEST_URI'];
        } else {
            $request = 'unknown';
        }
        $input['message'] = str_replace(PHP_EOL, ' ', $e->getMessage());
        $out = $e->getCode().": ".$e->getMessage()." in ".$e->getFile()." line ".$e->getLine(). " (Request: ".$request.")";

        $this->logger->log($out);
    }
}
