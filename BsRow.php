<?php
class BsRow extends BsElement
{       
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<div class='row " . $this->getClassesAsString() . "'" . $this->getOptionsAsString() . ">";
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();            
        }
        
        $this->strBuffer .= "</div>";
    }
}