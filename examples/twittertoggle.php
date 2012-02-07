<?php

/**
 * twitter toggle
 *
 * @package   tellstickPHP
 * @author    Christian Engvall <crilleengvall@gmail.com>
 * @copyright 2012 Christian Engvall <crilleengvall@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */
 
require_once("../twitter/twitter.php");
require_once("../telldus/device.php");

$twitterUsername = "crilleengvall";
$twitter = new Twitter($twitterUsername);
$tweets = array();

if($twitter->refreshUrlExists())
{
    $twitter->searchWithRefreshUrl($refreshUrl);
}
else
{ 
    $twitter->getMentionsByUsername($twitterUsername);
}

if(count($twitter->getTweets()) > 0)
{
    $tdtool = new TDTool();
    $device = $tdtool->getDeviceById(1);
    $device->turnOnForAPeriodOfTime(5000000);
}

?>