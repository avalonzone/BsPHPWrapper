<?php
class BsForm extends BsElement
{
    private $_isInline;
    private $_id;
    private $_size;
    private $_action;
    private $_method;
    //private $_isHorizontal;
    
    public function __construct($id, $action, $method = "POST", $isInline = false, $size = BsDefinition::FORMCONTROL_NORMAL, $isHorizontal = false)
    {
        $this->_isInline = $isInline;
        $this->_id = $id;
        $this->_size = $size;
        $this->_action = $action;
        $this->_method = $method;
        $this->_isHorizontal = $isHorizontal;
    }
    
    public function render()
    {
        $this->strBuffer = "";
        
        if($this->_isInline)
        {
            $this->strBuffer .= "<form id='" . $this->_id . "' method='" . $this->_method . "' action='" . $this->_action . "' role='form' data-toggle='validator' class='" . BsDefinition::FORM_INLINE . " " . $this->_size . "' >";
        }
        elseif($this->_isHorizontal)
        {
            $this->strBuffer .= "<form id='" . $this->_id . "' method='" . $this->_method . "' action='" . $this->_action . "' role='form' data-toggle='validator' class='form-horizontal " . $this->_size . "' >";
        }
        else
        {
            $this->strBuffer .= "<form id='" . $this->_id . "' method='" . $this->_method . "' action='" . $this->_action . "' role='form' data-toggle='validator' >";
        }
        
        
        foreach($this->elements as $element)
        {
            //CoreHelper::var_dumpF($this->_isHorizontal);
            if($this->_isHorizontal){
                $element->setHorizontal();
            }
            $this->strBuffer .= $element->__tostring();
        }
        
        $this->strBuffer .= "</form>";
    }
}