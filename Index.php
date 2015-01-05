<?php

namespace FileParser;

// include the autoloader settings file
require_once('RegisterSetting.php');

// register the autoloader method
\FileParser\RegisterSetting::registerSiteAutoloader();

use \FileParser\Classes\FileParserFactory;
use \FileParser\Classes\Logger;

// Added for PHP 5.5 support (PHP 5.5 produces warning if timezone is not set)
date_default_timezone_set('America/New_York');

try
{
    // Set the process start time
    Logger::$startTime  =   date("F j, Y, g:i a");

    $resultArray = array();

    // Using $_SERVER  as the arguments will be available irrespective of SAPI and register_globals
    $argv   =   isset($_SERVER['argv']) ? $_SERVER['argv'] : '';
    $argc   =   isset($_SERVER['argc']) ? $_SERVER['argc'] : '';

    // verify if argument is passed
    if ($argc != 2) {
        fwrite(STDOUT, ARGUMENT_MISSING);
        exit(0);
    }

    // remove first argument as it is the file name
    array_shift($argv);
    $fileName   =   trim($argv[0]);

    // Get the object of the class for parsing the file
    if(!FileParserFactory::getParserObject($fileName, $resultArray))
    {
        fwrite(STDOUT, $resultArray['error']);
    }
    else
    {
        // Call the method to parse the file
        $result =   $resultArray['obj']->parseFile($fileName, $resultArray);
        fwrite(STDOUT, $result);

        // Set the process end time
        Logger::$endTime    =   date("F j, Y, g:i a");

        // Write the log to a file
        if (isset($resultArray['success']))
            Logger::logMessage($resultArray['success']);
    }
    exit(0);
}
catch (\Exception $e)
{
    fwrite(STDOUT, $e->getMessage().PHP_EOL);
}
