<?php
/**
 * Twitter
 *
 * @package   tellstickPHP
 * @author    Christian Engvall <crilleengvall@gmail.com>
 * @copyright 2012 Christian Engvall <crilleengvall@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */
 
 require_once("twitter.search.php");
 require_once("../file/file.php");
 
 class Twitter
 {
    
    protected $_username;
    
    protected $_filepath;
    
    protected $_tweets;
 
    function __construct($username)
    {
        $this->_username = $username;
        $this->_filePath = "../twitter/users/";
    }
    
    function getTweets()
    {
        return($this->_tweets);
    }
    
    public function getMentionsByUsername()
    {
        $twitterSearch = new TwitterSearch();
        $jsonResponse = $twitterSearch->search("@" . $this->_username);
        
        $this->_saveRefreshUrlToDisc($jsonResponse->refresh_url);
        
        $this->_tweets = $jsonResponse->results;
    }
    
    public function searchWithRefreshUrl()
    {
        $twitterSearch = new TwitterSearch();
        $refreshUrl = $this->_getRefreshUrl();
        $jsonResponse = $twitterSearch->searchWithRefreshUrl($refreshUrl);
        
        $this->_saveRefreshUrlToDisc($jsonResponse->refresh_url);
        
        $this->_tweets = $jsonResponse->results;
    }
    
    protected function _saveRefreshUrlToDisc($refreshUrl)
    {
        $fileHandler = new File(); 
        $fileHandler->saveStringToFile($this->_filePath . $this->_username . ".txt", $refreshUrl);
    }
    
    protected function _getRefreshUrl()
    {
        $fileHandler = new File();   
        $refreshUrl = $fileHandler->getTwitterRefreshUrl($this->_filePath . $this->_username . ".txt", $refreshUrl);
        
        return($refreshUrl);
    }
    
    public function refreshUrlExists()
    {
        $fileHandler = new File();
        if($fileHandler->fileExists($this->_filePath . $this->_username . ".txt", $refreshUrl))
        {
            return(true);
        }
        else
        {
            return(false);
        }
    }
 }
 
 ?>