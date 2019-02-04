<?php
class BsFormButton extends BsElement
{
    private $_label;
    private $_type;
    private $_style;
    private $_size;
    private $_isBlock; // Not Implemented
    private $_isDisabled;
    private $_icon;
    
    public function __construct(    $label,
                                    $icon = false,
                                    $type = BsDefinition::FORMCONTROL_BUTTON_TYPE_BUTTON, 
                                    $style = BsDefinition::FORMCONTROL_BUTTON_DEFAULT,
                                    $size = BsDefinition::FORMCONTROL_BUTTON_SIZE_DEFAULT,
                                    $isBlock = false,
                                    $isDisabled = false)
    {
        $this->_label = $label;
        $this->_type = $type;
        $this->_style = $style;
        $this->_size = $size;
        $this->_isBlock = $isBlock;
        $this->_isDisabled = $isDisabled;
        $this->_icon = $icon;
        
    }
    
    public function setId($id)
    {
        $this->addOption("id", $id);
    }
    
    public function setNameAndValue($name, $value)
    {
        $this->addOption("name", $name);
        $this->addOption("value", $value);
    }
    
    public function render()
    {
        $this->addClass($this->alignement);
        
        $this->strBuffer = "";
        $stateString = "";
        if($this->_isDisabled) { $stateString = "disabled='disabled'"; }
        
        $this->strBuffer .= "<label>&nbsp;</label>";
        
        //TODO Ugly !!!!!!!!!!
        if($this->_isDisabled)
        {
            $this->strBuffer .= "<button " . $this->tooltip . " class='btn " . $this->_style . " " . $this->_size . " " . $this->alignement . " disabled'" . $this->getOptionsAsString() . " type='" . $this->_type . "' " . $stateString . ">";
        }
        else
        {
            $this->strBuffer .= "<button " . $this->tooltip . " class='btn " . $this->_style . " " . $this->_size . " " . $this->alignement . "'" . $this->getOptionsAsString() . " type='" . $this->_type . "' " . $stateString . ">";
        }
        
        if(!empty($this->_icon))
        {
            $bsGlyphicon = new BsGlyphicon($this->_icon);
            $this->strBuffer .= $bsGlyphicon->__tostring();
        }
                
        $this->strBuffer .= "   " . $this->_label;
        $this->strBuffer .= "</button>";
    }
}