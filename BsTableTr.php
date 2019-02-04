<?php

class BsTableTr extends BsElement
{
		
	public function __construct()
	{
		
	}
	
	public function render()
	{
		$this->strBuffer = "<tr>";
		
		count($this->elements); 
		
		foreach($this->elements as $element)
		{
			$this->strBuffer .= $element->__tostring();
		}
		
		$this->strBuffer .= "</tr>";
	}
}