<?php

class BsTableTBody extends BsElement {
		
    private $_rows;
    private $_headers;
    
    public function __construct(array $rows, array $headers)
	{
        $this->_rows = $rows;
        $this->_headers = $headers;
        
        foreach($rows as $row)
        {
            $tableRow = new BsTableTr();
            
            foreach($this->_headers as $header)
            {
                if(is_object($row))
                {
                    $tableRow->addElement(new BsTableTd($row->{$header}));
                }
                elseif(is_array($row))
                {
                    $tableRow->addElement(new BsTableTd($row[$header]));
                }
            }
            
            $this->addElement($tableRow);
        }
        
	}
	
	public function render()
	{
	    $this->strBuffer = "<tbody>";
	    
	    foreach ($this->elements as $element)
	    {
	        $this->strBuffer .= $element->__tostring();
	    }
	    
		$this->strBuffer .= "</tbody>";
	}
	
}