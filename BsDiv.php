<?php
class BsDiv extends BsElement
{
    private $_rawBodyContent = "";
    
    public function __construct($id = null)
    {
        if($id != null){
            $this->addOption("id", $id);
        }
    }
    
    
    public function setId($id)
    {
        $this->addOption("id", $id);
    }
    
    public function setRawBodyContent($content)
    {
        $this->_rawBodyContent = $content;
    }
        
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<div " . $this->getOptionsAsString() . " class=' " . $this->getClassesAsString() . "'>";

        $this->strBuffer .= $this->_rawBodyContent;
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();
        }
        
        $this->strBuffer .= "</div>";
    }
}