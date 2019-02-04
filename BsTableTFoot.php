<?php

class BsTableTFoot extends BsElement {
		
    private $_headers;
    
    public function __construct(array $headers)
	{
        $this->_headers = $headers;
        $tableRow = new BsTableTr();
        foreach($this->_headers as $header)
        {
            $tableRow->addElement(new BsTableTh($header));
        }
        $this->addElement($tableRow);
	}
	
	public function render()
	{
	    $this->strBuffer = "<tfoot>";
	    
	    foreach ($this->elements as $element)
	    {
	        $this->strBuffer .= $element->__tostring();
	    }
	    
		$this->strBuffer .= "</tfoot>";
	}
	
}