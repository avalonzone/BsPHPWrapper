<?php

class BsDropdown extends BsElement
{
    private $_id;
    private $_header;
    private $_isGroup;
    
    public function __construct($id, $header, $isGroup = true)
    {
        $this->_id = $id;
        $this->_header = $header;
        $this->_isGroup = $isGroup;
    }
    
    public function render()
    {
        $this->strBuffer = "";
        
        // What's the difference between dropdown and btn-group
        if($this->_isGroup)
        {
            $this->strBuffer .= "<div class='btn-group' role='group' >";
        }
        else
        {
            $this->strBuffer .= "<div class='dropdown'>";
        }
        
        $this->strBuffer .= "<button class='btn btn-default dropdown-toggle' type='button' id='" . $this->_id . "' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>";
        $this->strBuffer .= $this->_header;

        $this->strBuffer .= "<span class='caret'></span>";
        
        $this->strBuffer .= "</button>";
        
        $this->strBuffer .= "<ul class='dropdown-menu' aria-labelledby='" . $this->_id . "'>";
        
        foreach($this->elements as $element)
        {
            if(get_class($element) == "BsDropdownSeparator")
            {
                $this->strBuffer .= "<li role='separator' class='divider'>" . $element->__tostring() . "</li>";
            }
            else
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
        }
        
        $this->strBuffer .= "</ul>";
        $this->strBuffer .= "</div>";
    }
}