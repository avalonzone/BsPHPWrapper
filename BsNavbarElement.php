<?php
class BsNavbarElement extends BsElement
{
    private $_position;
    
    public function __construct($position)
    {
        $this->_position = $position;
    }
    
    public function render()
    {
        $this->strBuffer = "";

        $this->strBuffer .= "<ul class='nav navbar-nav " . $this->_position . "'>";
        
        foreach($this->elements as $element)
        {
            if(property_exists($element,"isDisabled") && $element->isDisabled == true)
            {
                $this->strBuffer .= "<li class='disabled'>" . $element->__tostring() . "</li>";
            }
            else
            {
                $this->strBuffer .= "<li>" . $element->__tostring() . "</li>";
            }
        }
        
        $this->strBuffer .= "</ul>";

    }
}