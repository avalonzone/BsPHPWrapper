<?php

class BsTableTagGroup extends BsElement 
{
	
	private $_tag;
	
	public function __construct($tag)
	{
		$this->_tag = $tag;
	}
	
	public function render()
	{
		$this->strBuffer = '<'.$this->_tag.'>';
		
		foreach($this->elements as $element)
		{
			$this->strBuffer .= $element->__tostring();
		}
		
		$this->strBuffer .= '</'.$this->_tag.'>';
	}
}