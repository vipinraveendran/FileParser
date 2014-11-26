<?php
/**
 * Class that define method to parse the CSV file
 * 
 */
namespace FileParser\Classes;
use \FileParser\Classes\Base\FileParserBase;

class CSVFileParser extends FileParserBase
{

    protected $resultData   =   '';

    public function parseFile($csvFile, &$resultArray)
    {
        $this->fileName =   $csvFile;

        // Parse the csv into an array
        $csvArray   =   array_map('str_getcsv', file($this->fileName));

        foreach ($csvArray as  $dataArray)
        {
            if(is_array($dataArray))
            {
                $categoryItems   =   '' ;
                $id         =   isset($dataArray[0]) ? trim($dataArray[0]) : '' ;
                $name       =   isset($dataArray[1]) ? trim($dataArray[1]) : '' ;
                $quantity   =   isset($dataArray[2]) ? trim($dataArray[2]) : '' ;
                $category   =   isset($dataArray[3]) ? trim($dataArray[3]) : '' ;

                // Get the categories
                if(isset($category) && $category !== '')
                {
                    // Split the categories to an array
                    $categoryArray   =   explode(';', $category);

                    // Loop through the categories array and create the category items string
                    foreach($categoryArray as $categoryItem)
                    {
                        if(isset($categoryItem) && trim($categoryItem) !== '')
                         $categoryItems  .=  $categoryItem.PHP_EOL;
                    }
                }
                // Create the result if either id, name or quantity exist
                if(( $id !== '') || ($name !== '') || ($quantity !== ''))
                   $this->resultData .= $id.' '.$name.' ('.$quantity.')'.PHP_EOL. $categoryItems. PHP_EOL;
            }
        }
        $resultArray['success'] = COMPLETED_SUCCESSFULLY;
        // Return the results
        return $this->resultData;
    }

}
