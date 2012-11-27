<?php
/**
 * Gives a simpe error message printed on the screen, if something happens in the program.
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
class Ilib_Errorhandler_Handler_Echo implements Ilib_Errorhandler_Handler
{
    /**
     * Display errors for users
     *
     * @param array $input Array with the error input
     *
     * @return void
     */
    public function handle(Exception $e)
    {
        echo '<pre>'.$e.'</pre>';
        // echo ''.$e->getCode().': '.$e->getMessage().' in '.$e->getFile().' line '.$e->getLine().' (Request: '.$e).')';
    }
}