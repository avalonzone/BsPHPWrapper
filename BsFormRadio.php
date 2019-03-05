<?php
class BsFormRadio extends BsElement
{
    private $_label;
    private $_id;
    private $_name;
    private $_value;
    private $_isInline;
    private $_isDisabled;
    private $_isChecked = false;
    
    public function __construct(    $label, 
                                    $id, 
                                    $name, 
                                    $value = "", 
                                    $isInline = false, 
                                    $isDisabled = false)
    {
        $this->_label = $label;
        $this->_id = $id;
        $this->_name = $name;
        $this->_value = $value;
        $this->_isInline = $isInline;
        $this->_isDisabled = $isDisabled;
    }
    
    public function setIsChecked($isChecked)
    {
        $this->_isChecked = $isChecked;
    }
    
    public function setIsDisabled($isDisabled)
    {
        $this->_isDisabled = $isDisabled;
    }
    
    public function getIsCheckedAsString()
    {
        if($this->_isChecked)
        {
            return "checked='checked'";
        }
        else
        {
            return "";
        }
    }
    
    public function render()
    {
        $this->strBuffer = "";
        
        $this->strBuffer .= "<div class='checkbox'>";
        if($this->_isHorizontal){
            $this->strBuffer .= '<div class="col-md-2"></div>';
        }
        $this->strBuffer .= "<label class='radio' " . $this->tooltip . ">";
        
        if($this->_isDisabled)
        {
            $this->strBuffer .= "<input type='radio' name='" . $this->_name . "' value='" . $this->_value . "' id='" . $this->_id . "' " . $this->getOptionsAsString() . " " . $this->getIsCheckedAsString() . " disabled>";
        }
        else
        {
            $this->strBuffer .= "<input type='radio' name='" . $this->_name . "' value='" . $this->_value."' id='" . $this->_id . "' " . $this->getOptionsAsString() . " " . $this->getIsCheckedAsString(). " >";
        }
        
        $this->strBuffer .= $this->_label;
        $this->strBuffer .= "</label>";
        $this->strBuffer .= "</div>";
       
    }
}