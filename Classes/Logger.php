<?php
/**
 * Class that define method to log the messages
 * 
 */
namespace FileParser\Classes;

class Logger
{
    public static $startTime    =   '';
    public static $endTime  =   '';

    public static function logMessage($messageArray)
    {
        $messageString  =   LOG_START_TEXT . self::$startTime. ' ' .$messageArray . LOG_END_TEXT . self::$endTime. PHP_EOL;
        file_put_contents(LOG_FILE, $messageString ,FILE_APPEND | LOCK_EX);
    }
}
