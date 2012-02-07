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
 
 class Twitter
 {
    function __construct()
    {
    }
    
    public function getMentionsByUsername($username)
    {
        $twitterSearch = new TwitterSearch();
        $twitterSearch->search("@" . $username);
    }
 }
 
 ?>