<?php
class BsFormInputGroup extends BsElement
{
    private $_position;
    
    public function __construct($position = null)
    {
        $this->_position = $position;
    }
    
    public function render()
    {
        $this->strBuffer  = "";
        $this->strBuffer .= "<div class='input-group'>";
        
        $buttons = array();
        
        foreach($this->elements as $element)
        {
            if(get_class($element) == "BsFormButton")
            {
                $buttons[] = $element;
            }
            else
            {
                $this->strBuffer .= $element->__tostring();
            }
        }
        
        $this->strBuffer .= "<span class='input-group-btn'>";
        
        foreach($buttons as $button)
        {
            $this->strBuffer .= $button->__tostring();
        }
        
        $this->strBuffer .= "</span>";
        
        
        $this->strBuffer .= "</div>";
    }

}