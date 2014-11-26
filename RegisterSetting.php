<?php
/**
 * Class that define method to autoload class files
 * 
 */
namespace FileParser;
require_once('Includes/AppConstants.php');
/**
 * Class to register autoload settings
 */
class RegisterSetting
{
    public static function registerSiteAutoloader()
    {
        spl_autoload_register(__NAMESPACE__ . "\\RegisterSetting::autoLoad");

    }

    /**
     * @static PSR-0 Autoloader
     * @param $className
     */
    public static function autoLoad($className)
    {
        $thisClass = str_replace(__NAMESPACE__.'\\', '', __CLASS__);

        $baseDir = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR;

        if ($lastNsPos = strripos($baseDir, '\\')) {
           $baseDir = substr($baseDir, 0, $lastNsPos).'\\';
        }

        if (substr($baseDir, -strlen($thisClass)) === $thisClass) {
            $baseDir = substr($baseDir, 0, -strlen($thisClass));
        }

        $className = ltrim($className, '\\');
        $fileName  = $baseDir;
        $namespace = '';
        if ($lastNsPos = strripos($className, '\\')) {

            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        if (file_exists($fileName)) {
            require $fileName;
        }
    }

}