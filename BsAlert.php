<?php

class BsAlert extends BsElement
{

    private $_type;
    private $_text;
    
    public function __construct($text, $type = BsDefinition::ALERT_INFO, $icon = false)
        {
            $this->_type = $type;
            $this->_text = $text;
        }
        
        public function render()
        {
            $this->strBuffer = "";
            $this->strBuffer .= "<div class='alert " . $this->_type . "' role='alert'>";
            
            $this->strBuffer .= $this->_text;
            
            foreach($this->elements as $element)
            {
                $this->strBuffer .= $element->__tostring();
            }
            
            $this->strBuffer .= "</div>";
        }		
}

