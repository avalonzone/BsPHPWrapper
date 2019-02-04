<?php
class BsDiv extends BsElement
{
    private $_type;
    private $_headerSize;
    private $_footerSize;
    private $_rawBodyContent = "";
    private $_rawHeaderContent = "";
    private $_rawFooterContent = "";
    private $_classString = "";
    private $_bodyId = "";
    
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
        $this->strBuffer .= "<div " . $this->getOptionsAsString() . " class='" . $this->_classString . " " . $this->_type . "'>";

        $this->strBuffer .= $this->_rawBodyContent;
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();
        }
        
        $this->strBuffer .= "</div>";
    }
}