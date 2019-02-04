<?php
class BsInputGroupButtonElement extends BsElement
{
    private $_icon;
    private $_style;
    private $_type;
    private $_name;
    private $_value;
    
    public function __construct(BsGlyphicon $icon, $name, $value, $style = BsDefinition::FORMCONTROL_BUTTON_DEFAULT, $type = BsDefinition::FORMCONTROL_BUTTON_TYPE_BUTTON)
    {
        $this->_icon = $icon;
        $this->_style = $style;
        $this->_type = $type;
        $this->_name = $name;
        $this->_value = $value;
        
    }
    
    public function render()
    {
        
        $this->strBuffer = "";
        $this->strBuffer .= "<button name='" . $this->_name . "' value='" . $this->_value . "' class='btn " . $this->_style . "' aria-label='Bold' type='" . $this->_type . "' " . $this->getOptionsAsString() . " " . $this->tooltip .">";
        
        $this->strBuffer .= $this->_icon->__tostring();
        
        $this->strBuffer .= "</button>";
    }
}

/*
Input with multiple button :
############################

<div class="input-group">
<div class="input-group-btn">
<!-- Buttons -->
<button class="btn btn-default" aria-label="Bold" type="button">
<span class="glyphicon glyphicon-bold"></span>
</button>
<button class="btn btn-default" aria-label="Italic" type="button">
<span class="glyphicon glyphicon-italic"></span>
</button>
</div>
<input type="text" class="form-control" aria-label="...">
</div>
*/