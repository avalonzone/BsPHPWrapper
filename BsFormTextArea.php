<?php
class BsFormTextArea extends BsElement
{
    private $_id;
    private $_name;
    private $_label;
    private $_rows;
    private $_text;
    private $_placeholder;
    private $_isReadOnly;
    private $_isDisabled;
    
    public function __construct($label, $id = "", $name = "", $rows = 2, $text = "", $placeholder = "Enter your text here...", $isDisabled = false, $isReadOnly = false)
    {
        $randomId = BsDefinition::getRandomUniqueId();
        
        if(!$id){$this->_id = $randomId;}else{$this->_id = $id;}
        if(!$name){$this->_name = $randomId;}else{$this->_name = $name;}
        
        $this->_label = $label;
        $this->_rows = $rows;
        $this->_text = $text;
        $this->_placeholder = $placeholder;
        $this->_isDisabled = $isDisabled;
        $this->_isReadOnly = $isReadOnly;
        
        $this->addOption("id", $this->_id);
        $this->addOption("name", $this->_name);
        $this->addOption("rows", $this->_rows);
        $this->addOption("placeholder", $this->_placeholder);
        
        if($this->_isDisabled){$this->addOption("disabled","");}
        if($this->_isReadOnly){$this->addOption("readonly","");}
    }
        
    public function render()
    {        
        $this->strBuffer = "";
                
        $formGroupDiv = new BsDiv();
        $formGroupDiv->addClass(BsDefinition::FORMGROUP_CLASS);
        
        $divContent = "";
        $divContent .= "<label for='" . $this->_id. "' >" . $this->_label . "</label>";
        $divContent .= "<textarea class='form-control rounded-0' " . $this->getOptionsAsString() . ">" . $this->_text . "</textarea>";
        
        $formGroupDiv->setRawBodyContent($divContent);
        
        $this->strBuffer .= $formGroupDiv->__tostring();
                 
    }
}