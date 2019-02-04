<?php
class BsFormCombobox extends BsElement
{
    private $_name;
    private $_label;
    private $_items = array();
    private $_size;
    private $_readOnly;
    private $_isDisabled;
    private $_isRequired;
    private $_isMultiple;
    
    public function __construct($name, $label, $items, $size, $isDisabled=false)
    {
        $this->_name = $name;
        $this->_label = $label;
        $this->_items = $items;
        $this->_size = $size;
        $this->_isDisabled = $isDisabled;
    }
    
    public function setAsMultiple()
    {
        $this->_isMultiple = true;
    }
    
    public function addItem($key, $value)
    {
        $this->_items[strtolower($key)] = $value;
    }
    
    public function render()
    {
        $stateString = "";
        $multipleString = "";
                
        if($this->_isDisabled) { $stateString = "disabled"; }
        if($this->_isMultiple) { $multipleString = "multiple"; }
        
        $this->strBuffer  = "";
        $this->strBuffer .= "<div class='form-group'>";
        if($this->_label != null)
        {
            $this->strBuffer .= "<label class='control-label'>" . $this->_label . "</label>";
        }
        $this->strBuffer .= "<div class='selectContainer'>";
                
        $this->strBuffer .= "<select " . $multipleString . " " . $this->tooltip . " class='form-control' " . $this->getOptionsAsString() ." name='" . $this->_name . "' " . $stateString . ">";
        
        foreach ($this->_items as $key => $value)
        {
            if(is_array($value))
            {
                $optionString = "";
                if($value[1] == false)
                {
                    $optionString = "disabled";
                }
                
                
                $this->strBuffer .= "<option value='" . $key . "' " . $optionString . ">" . $value[0] . "</option>";
            }
            else
            {
                $this->strBuffer .= "<option value='" . $key . "'>" . $value . "</option>";
            }
        }
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();
        }
        
        $this->strBuffer .= "</select>";
        $this->strBuffer .= "</div>";
        $this->strBuffer .= "</div>";
    }
}