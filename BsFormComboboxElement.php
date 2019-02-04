<?php
class BsFormComboboxElement extends BsElement
{
    private $_value;
    private $_displayValue;
    private $_isDisabled;
    
    public function __construct($value, $displayValue, $isDisabled=false, $options = array())
    {
        $this->_value = $value;
        $this->_displayValue = $displayValue;
        $this->_isDisabled = $isDisabled;
    }
        
    public function render()
    {
        $stateString = "";
                
        if($this->_isDisabled) { $stateString = "disabled"; }
        
        $this->strBuffer  = "";
        $this->strBuffer .= "<option value='" . $this->_value . "' " . $this->getOptionsAsString() . " " . $stateString . ">" . $this->_displayValue . "</option>";
        
    }
}