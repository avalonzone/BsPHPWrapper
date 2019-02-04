<?php
class BsFormGroup extends BsElement
{
    public function render()
    {
        $this->strBuffer = "";
        
        // Removed 'has-feedback' should ne reimplemented later.
        $this->strBuffer .= "<div class='form-group " . $this->getClassesAsString() . "'" . $this->getOptionsAsString() . ">";
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();
        }
        
        $this->strBuffer .= "</div>";
    }
}