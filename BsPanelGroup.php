<?php
class BsPanelGroup extends BsElement
{       
    private $_id;
    
    public function __construct($id = "")
    {
        if(!$id)
        {
            $this->_id = BsDefinition::getRandomUniqueId();
        }
    }
    
    public function getId()
    {
        return $this->_id;
    }
    
    public function render()
    {
        
        $this->strBuffer = "";
        $this->strBuffer .= "<div class='panel-group' id='" . $this->_id ."'>";
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();          
        }
        
        $this->strBuffer .= "</div>";
    }
}