<?php
/**
 * Factory Class that define method to generate the object of required class
 * 
 */
namespace FileParser\Classes;
use \FileParser\Includes;
use \FileParser\Classes\CSVFileParser;
use \FileParser\Classes\XMLFileParser;
use \FileParser\Classes\JSONFileParser;

class FileParserFactory
{

    public static function getParserObject($fileName, &$resultArray)
    {

        $parserObj  =   '';
        $baseDir    =   '';

        // Get the base directory of file location
        if ($lastNsPos  =   strripos(__DIR__, '\\')) {
            $baseDir    =   substr(__DIR__, 0, $lastNsPos).'\\';
        }
        $fileName   =   $baseDir.$fileName;

        if($fileName === '')
        {
            $resultArray['error']   =   INVALID_PARAMETER;
            return false;
        }
        if (!file_exists($fileName))
        {
            $resultArray['error']   =   FILE_NOT_EXIST;
            return false;
        }
        if (!is_file($fileName))
        {
            $resultArray['error']   =   INVALID_FILE_NAME;
            return false;
        }

        $fileInfo   =   pathinfo($fileName);

        if(!isset($fileInfo['extension']))
        {
            $resultArray['error']   =   INVALID_FILE_NAME;
            return false;
        }

        // check for file types
        switch ($fileInfo['extension'])
        {
            case "csv":
                $parserObj  =   new CSVFileParser();
                break;
            case "xml":
                $parserObj  =   new XMLFileParser();
                break;
            case "json":
                $parserObj  =   new JSONFileParser();
                break;
            default:
                $resultArray['error']   =   FILE_FORMAT_ERROR;
                return false;
        }
        $resultArray['obj'] =   $parserObj;

        return true;

    }

}
