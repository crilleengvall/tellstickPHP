<?php
/**
 * Twitter search wrapper
 *
 * @package   tellstickPHP
 * @author    Christian Engvall <crilleengvall@gmail.com>
 * @copyright 2012 Christian Engvall <crilleengvall@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */
 
 require_once("../json/service.php");
 
 class TwitterSearch extends Service
 {
 
    protected static $_url;
    
    function __construct()
    {
        $this->_url = "http://search.twitter.com/search.json?q=";
    }
    
    function search($query)
    {
        $searchUrl = $this->_url . $query;
        $this->_getJson($searchUrl);
    }
    
 }
 
 ?>