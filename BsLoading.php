<?php
class BsLoading extends BsElement
{     
    private $_id;
    
    public function __construct($id)
    {
        $this->_id = $id;
    }
    
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<div class='row " . $this->getClassesAsString() . "' id='" . $this->_id . "'>";
                
        $this->strBuffer .= "<i class='fa fa-refresh fa-spin fa-3x fa-fw margin-bottom'></i>";
        $this->strBuffer .= "<span class='sr-only'>Loading...</span>";
                
        $this->strBuffer .= "</div>";
    }
}