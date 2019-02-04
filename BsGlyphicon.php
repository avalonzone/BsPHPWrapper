<?php
class BsGlyphicon extends BsElement
{
    private $_iconName;
    
    public function __construct($iconName = BsDefinition::GLYPHICON_LIST)
    {
        $this->_iconName = $iconName;
    }
    
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<span class='" . $this->_iconName . "' aria-hidden='true'></span>";
    }
}