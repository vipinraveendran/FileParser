<?php
/**
 * Base class for file parsing
 * 
 */

namespace FileParser\Classes\Base;

/**
 * Base class for file parser
 */
abstract class FileParserBase
{
    protected $fileName;

    abstract protected function parseFile($fileName, &$resultArray);
}
