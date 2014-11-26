This is a PHP CLI script which is used to parse a specific format csv file and output the result in below format

[id] [name] [(quantity)]
    - [category 1]
    - [category 2]
    - [category n...]

Example:  

    68-OX-YH94 Carrot (5)
    - vegetable
    - green
    - orange
    - skinny 
	
Features

    The code has been tested in Ubuntu 14 and Windows 7.
    The code has been tested with PHP 5.4 and PHP 5.5.
    Factory Pattern has been used to support multiple file formats and additional parsers. 
	This helps to keep the modification of the existing framework to a minimum 
	during future enhancements.
    Logger class has been used to write logs to a file in the root directory.

Usage

    In command prompt browse to the directory where the files is placed.(FileParser) 
	Then type  "php Index.php items.csv"
    The csv file need to exist in root directory