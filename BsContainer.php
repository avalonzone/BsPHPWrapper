<?php
class BsContainer extends BsElement
{
		private $_type;
	
		public function __construct($type = BsDefinition::CONTAINER_NORMAL)
		{
			$this->_type = $type;
		}
		
		public function render()
		{
		    $this->strBuffer = "";
			$this->strBuffer .= "<div class='" . $this->_type . "'" . $this->getOptionsAsString() . " ".$this->tooltip.">";
			
			foreach($this->elements as $element)
			{
				$this->strBuffer .= $element->__tostring();
			}
			
			$this->strBuffer .= "</div>";
		}		
}