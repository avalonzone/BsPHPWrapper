<?php
class BsFormComboboxElement extends BsElement
{
    private $_value;
    private $_displayValue;
    private $_isDisabled;
    private $_isSelected;
    
    public function __construct($value, $displayValue, $isDisabled=false, $isSelected = false)
    {
        $this->_value = $value;
        $this->_displayValue = $displayValue;
        $this->_isDisabled = $isDisabled;
        $this->_isSelected = $isSelected;
        
    }
    
    /*public function setHorizontal(){
        $this->_isHorizontal = true;
    }*/
        
    public function render()
    {
        $stateString = "";
        
                
        if($this->_isDisabled) { $stateString = "disabled"; }
        if($this->_isSelected){
            $this->addOption('selected', 'selected');
        }
        
        $this->strBuffer  = "";
        $this->strBuffer .= "<option value='" . $this->_value . "' " . $this->getOptionsAsString() . " " . $stateString . ">" . $this->_displayValue . "</option>";
        
        
        
    }
}