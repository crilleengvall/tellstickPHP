<?php

/**
 * toggle
 *
 * @package   tellstickPHP
 * @author    Christian Engvall <crilleengvall@gmail.com>
 * @copyright 2012 Christian Engvall <crilleengvall@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */

include("../telldus/device.php");

$tdtool = new TDTool();
$device = $tdtool->getDeviceById(1);
$device->toggle();

?>