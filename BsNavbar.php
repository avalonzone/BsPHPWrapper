<?php
class BsNavbar extends BsElement
{	
    private $_id;
    
	public function __construct($id = "navbar")
	{
	    $this->_id = $id;
	}
	
	public function render()
	{
		$this->strBuffer = "";
		$this->strBuffer .= "<div class='collapse navbar-collapse' id='" . $this->_id . "' " . $this->getOptionsAsString() . ">";
		
		foreach($this->elements as $element)
		{
			$this->strBuffer .= $element->__tostring();
		}
			
		$this->strBuffer .= "</div>";
				
	}
}