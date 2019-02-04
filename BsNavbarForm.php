<?php
class NavbarForm extends BsElement
{
    private $_position;
    private $_text;
    private $_bsFormElements;
    
    public function __construct($text, $position = BsDefinition::NAVBAR_LEFT)
    {
        $this->_position = $position;
        $this->_text = $text;
        $this->render();
    }
    
    public function render()
    {
        $this->strBuffer .= "<p class='" . BsDefinition::NAVBAR_TEXT . " " . $this->_position . "' " . $this->getOptionsAsString() . ">" . $this->_text . "</p>";
    }
}