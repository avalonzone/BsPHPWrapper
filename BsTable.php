<?php
 
 class BsTable extends BsElement
 {
 	
     private $_datas = array();
     private $_dataHeaders = array();
 	
 	// Require Array of Objects or Array of Array - go one level deep !
 	public function __construct($id, $datas = array(), $headersOnly = false)
 	{
 	    $this->addOption("id", $id);
 	    $this->_datas = $datas;
 	    //$this->addClass(array("table","table-striped","table-bordered","dataTable"));
 	    $this->addClass(array("table","table-striped","table-bordered"));
 	    
 	    
 	    if(count($this->_datas) > 0)
 	    {
 	        if(is_object($this->_datas[0]))
 	        {
 	            $this->_dataHeaders = array_keys(get_object_vars($this->_datas[0]));
 	        }
 	        else
 	        { 	            
 	            $this->_dataHeaders = array_keys($this->_datas);
 	        }
 	        
 	        
 	        $thead = new BsTableTHead($this->_dataHeaders);
 	        $this->addElement($thead);
 	        
 	        if(!$headersOnly)
 	        {
     	        $tbody = new BsTableTBody($this->_datas, $this->_dataHeaders);
     	        $this->addElement($tbody);
 	        }
 	        
 	        $tfoot = new BsTableTFoot($this->_dataHeaders);
 	        $this->addElement($tfoot);
 	    }
 	    
 	}
 	
 	public function render()
 	{
 		
 		$this->strBuffer = "<table " . $this->getOptionsAsString() . " class='" . $this->getClassesAsString() . "'>";
 		
 		foreach($this->elements as $element)
 		{
 			$this->strBuffer .= $element->__tostring();
 		}
 		
 		$this->strBuffer .= '</table>';
 	}
 }