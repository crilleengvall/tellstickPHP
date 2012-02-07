<?php 
/**
 * cURL service
 *
 * @package   tellstickPHP
 * @author    Christian Engvall <crilleengvall@gmail.com>
 * @copyright 2012 Christian Engvall <crilleengvall@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */
 
 class Service 
 {
     
    function __construct()
    {
    }
     
    protected function _getJson($url)
    {
        $ch = $this->_initCurl($url);
        $json = $this->_executeRequest($ch);
        $this->_closeRequest($ch);
        
        return($json);
    }
    
    private function _initCurl($url)
    {
        $curlOptions = array(CURLOPT_HEADER => true, CURLOPT_RETURNTRANSFER => true);
        $ch = curl_init($url);
        curl_setopt_array($ch, $curlOptions);
    
        return($ch);
    }
    
    private function _executeRequest($ch)
    {
        $data = curl_exec($ch);
        $info = curl_getinfo($ch);
        
        
    
        $body = substr($data, $info['header_size']);
        
        $json = json_decode($body);
        
        return($json);
    }
    
    private function _closeRequest($ch)
    {
        curl_close($ch);
    }
 }
 
?>