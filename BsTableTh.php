<?php

class BsTableTh extends BsElement {
		
    private $_title;
    
	public function __construct($title)
	{
        $this->_title = $title;
	}
	
	public function render()
	{
		$this->strBuffer = "<th>" . $this->_title . "</th>";
	}
	
}