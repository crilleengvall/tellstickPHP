<?php
/**
 * Device
 *
 * @package   tellstickPHP
 * @author    Christian Engvall <crilleengvall@gmail.com>
 * @copyright 2012 Christian Engvall <crilleengvall@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */
 
 include('TDTool.php');
  
 class Device
 {
    protected static $_id;
    
    protected static $_name;
    
    protected static $_status;
    
    function __construct($id, $name, $status)
    {
        $this->_id = $id;
        $this->_name = $name;
        $this->_status = $status;
    }
    
    function getId()
    {
        return($this->_id);
    }
    
    function setId($id){
        $this->_id = $id;
    }
    
    function getStatus()
    {
        return($this->_status);
    }
    
    function setStatus($on){
        $this->_status = $on;
    }
    
    function getName()
    {
        return($this->_name);
    }
    
    function setName($name){
        $this->_name = $name;
    }
    
    function toggle()
    {
        $tdtool = new TDTool();
        $tdtool->toggleDevice($this);
    }
    
    function turnOff()
    {
        $tdtool = new TDTool();
        $tdtool->turnOffDevice($this);
    }
    
    function turnOn()
    {
        $tdtool = new TDTool();
        $tdtool->turnOnDevice($this);
    }
    
    function turnOnForAPeriodOfTime($microSeconds)
    {
        $tdtool = new TDTool();
        $tdtool->turnOnDevice($this);
        usleep($microSeconds);
        $tdtool->turnOffDevice($this);
    }
 }