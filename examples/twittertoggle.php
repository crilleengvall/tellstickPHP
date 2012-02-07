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

$twitter = new Twitter();

$twitter->getMentionsByUsername("crilleengvall");

?>