<?php

class BsTableTd extends BsElement 
{
	
    private $_value;
    
    public function __construct($value)
    {
        $this->_value = $value;
        /*
        if(is_array($value))
        {
            $separator = "";
            foreach($value as $element)
            {
                $this->_value .= $separator . $element;
                $separator = " | ";
            }
        }
        else
        {
            
        }
        */
        
    }
    
    public function render()
    {
        $this->strBuffer = "<td " . $this->getOptionsAsString() . " " . $this->tooltip . " class='" . $this->getClassesAsString() ."'>" . $this->_value . "</td>";
    }
}