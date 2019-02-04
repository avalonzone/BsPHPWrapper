<?php
class BsForm extends BsElement
{
    private $_isInline;
    private $_id;
    private $_size;
    private $_action;
    private $_method;
    
    public function __construct($id, $action, $method = "POST", $isInline = false, $size = BsDefinition::FORMCONTROL_NORMAL)
    {
        $this->_isInline = $isInline;
        $this->_id = $id;
        $this->_size = $size;
        $this->_action = $action;
        $this->_method = $method;
    }
    
    public function render()
    {
        $this->strBuffer = "";
        
        if($this->_isInline)
        {
            $this->strBuffer .= "<form id='" . $this->_id . "' method='" . $this->_method . "' action='" . $this->_action . "' role='form' data-toggle='validator' class='" . BsDefinition::FORM_INLINE . " " . $this->_size . "' >";
        }
        else
        {
            $this->strBuffer .= "<form id='" . $this->_id . "' method='" . $this->_method . "' action='" . $this->_action . "' role='form' data-toggle='validator' >";
        }
        
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();
        }
        
        $this->strBuffer .= "</form>";
    }
}