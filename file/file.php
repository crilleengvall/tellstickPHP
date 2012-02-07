<?php

/**
 * file handler
 *
 * @package   tellstickPHP
 * @author    Christian Engvall <crilleengvall@gmail.com>
 * @copyright 2012 Christian Engvall <crilleengvall@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */
 
 class File 
 {
    function __construct()
    {
    }
    
    public function fileExists($fileName)
    {
        if(file_exists($fileName))
        {
            return(true);
        }
        else
        {
            return(false);
        }
    }
    
    public function saveStringToFile($fileName, $string)
    {
        $file = $this->_openFileToWrite($fileName);
        fwrite($file, $string);
        $this->_closeFile($file);
    }
    
    public function getTwitterRefreshUrl($fileName)
    {
        $file = $this->_openFileToRead($fileName);
        $url = fread($file, filesize($fileName));
        $this->_closeFile($file);
        
        return($url);
    }
    
    protected function _openFileToWrite($fileName)
    {
        $file = fopen($fileName, 'w') or die("can't open file");
        
        return($file);
    }
    
    protected function _openFileToRead($fileName)
    {
        $file = fopen($fileName, 'r') or die("can't open file");
        
        return($file);
    }
    
    protected function _closeFile($file)
    {
        fclose($file);
    }
    
 } 