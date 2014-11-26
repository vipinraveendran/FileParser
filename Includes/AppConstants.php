<?php
/**
 * This file defines the constants used in the application
 * 
 */
namespace FileParser\Includes;

// Error messages
define('FILE_FORMAT_ERROR', 'File format not supported'. PHP_EOL);
define('ARGUMENT_MISSING', 'Argument missing ' .PHP_EOL. 'Usage: Index.php <filename>' .PHP_EOL);
define('INVALID_PARAMETER', 'Invalid parameter' .PHP_EOL. 'Usage: Index.php <filename>' .PHP_EOL);
define('FILE_NOT_EXIST', 'File does not exist' .PHP_EOL. 'Usage: Index.php <filename>' .PHP_EOL);
define('INVALID_FILE_NAME', 'Not a valid file name' .PHP_EOL. 'Usage: Index.php <filename>' .PHP_EOL);

//Success Message
define('COMPLETED_SUCCESSFULLY', '--The process completed successfully-- ');

// Log file name
define('LOG_FILE', 'log.txt');
define('LOG_START_TEXT', 'Start Time: ');
define('LOG_END_TEXT', 'End Time: ');
