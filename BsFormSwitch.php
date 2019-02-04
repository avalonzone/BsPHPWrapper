<?php
class BsFormSwitch extends BsElement {
    
    private $_labelA;
    private $_labelB;
    
    public function __construct($labelA, $labelB){
        $this->_labelA = $labelA;
        $this->_labelB = $labelB;
    }
    
    public function render(){
               
        $this->strBuffer  = "<div class='col-md-2 col-md-offset-0'>";
        $this->strBuffer .= "<div class='form-group'>";
        
        $this->strBuffer .= "<div class='checkbox'>";
        $this->strBuffer .= "<label>";
        
        $this->strBuffer .= "<input type='checkbox' data-toggle='toggle' data-off='" . $this->_labelB . "' data-on='" . $this->_labelA . "'>";
        
        $this->strBuffer .= "</label>";
        $this->strBuffer .= "</div>";
        
        $this->strBuffer .= "</div>";
        $this->strBuffer .= "</div>";
        
    }
    
    
    
}