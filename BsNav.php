<?php
class BsNav extends BsElement
{
	private $_position;
	private $_type;
	private $_bsContainer;
	
	public function __construct(   $position = BsDefinition::NAVBAR_FIXED_TOP, 
	                               $type = BsDefinition::NAVBAR_INVERSE, 
	                               $bsContainerType = BsDefinition::CONTAINER_FLUID)
	{
		$this->_position = $position;
		$this->_type = $type;		
		$this->_bsContainer = new BsContainer($bsContainerType);
	}
	
	public function render()
	{
	    foreach($this->elements as $element)
	    {
	        $this->_bsContainer->addElement($element);
	    }
	    
	    $this->strBuffer = "";
		$this->strBuffer .= "<nav class='navbar " . $this->_type . " " . $this->_position . "' " . $this->getOptionsAsString() . ">";
		$this->strBuffer .= $this->_bsContainer->__tostring();
		$this->strBuffer .= "</nav>";
	}

}