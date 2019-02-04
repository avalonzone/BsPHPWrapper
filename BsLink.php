<?php
class BsLink extends BsElement
{
    private $_name;
    private $_target;
    public $isDisabled;
    
    public function __construct($name, $target = "#", $isDisabled = false)
    {
        $this->_name = $name;
        $this->_target = $target;
        $this->isDisabled = $isDisabled;
    }
    
    public function render()
    {
        $this->strBuffer = "";
        if($this->isDisabled){
        	$this->_target = '#';
        }
        $this->strBuffer .= "<a href='" . $this->_target . "'>" . $this->_name . "</a>";
    }
}