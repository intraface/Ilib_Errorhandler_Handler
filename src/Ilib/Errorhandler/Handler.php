<?php
interface Ilib_Errorhandler_Handler
{
    function handle(Exception $exception);
}