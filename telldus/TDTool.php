<?php
/**
 * TDTool
 *
 * @package   tellstickPHP
 * @author    Christian Engvall <crilleengvall@gmail.com>
 * @copyright 2012 Christian Engvall <crilleengvall@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */
  
 class TDTool
 {  
    function __construct()
    {
    }
    
    function toggleDevice($device)
    {
        $deviceToToggle = $this->getDeviceById($device->getId());
        if($deviceToToggle->getStatus())
        {
            $this->turnOffDevice($deviceToToggle);
        }
        else
        {
            $this->turnOnDevice($deviceToToggle);
        }
    }
    
    function turnOffDevice($device)
    {
        $output = shell_exec('tdtool --off ' . $device->getId());
        echo($output);
    }
    
    function turnOnDevice($device)
    {
        $output = shell_exec('tdtool --on ' . $device->getId());
        echo($output); 
    }
    
    function getAllDevices()
    {
        $output = shell_exec('tdtool --list');
        $devices = $this->_convertToDevice($output);
                
        return($devices);
    }
    
    function getDeviceByName($name)
    {
        $devices = $this->getAlldevices();
        foreach($devices as $i => $device){
            if($device->getName() == $name){
                return($device);
            }
        }
    }
    
    function getDeviceById($id)
    {
        $devices = $this->getAlldevices();
        foreach($devices as $i => $device){
            if($device->getId() == $id){
                return($device);
            }
        } 
    }
    
    protected function _convertToDevice($deviceInfo)
    {
        $splitDevices = explode("\n", $deviceInfo);
        
        $devices = array();
           
        foreach ($splitDevices as $i => $value) {
            if($i != 0){
                $device = $this->_convertArrayToDevice($value);
                if(strlen($device->getName()) != 0){
                    array_push($devices, $device);
                }
            }
        }
    
        return($devices);
    }
    
    protected function _convertArrayToDevice($deviceArray)
    {
        $deviceInfo = explode("\t", $deviceArray);
        $status = false;
                
        if($deviceInfo[2] == "ON"){
            $status = true;
        }
                
        $device = new Device($deviceInfo[0], $deviceInfo[1], $status);
        
        return($device);
    }
 }