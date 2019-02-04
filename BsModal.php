<?php

class BsModal extends BsElement{
	//TODO : Definir si show ou pas.
	private $_header;
	private $_headerIcon;
	private $_footer;
	private $_size;
	private $_id;
	private $_rawBodyContent = "";
	private $_footerElements = array();
	
	public function __construct($id, $header = false, $headerIcon = false, $footer = false, $size = BsDefinition::MODAL_SIZE_LARGE)
	{
		$this->_header = $header;
		$this->_footer = $footer;
		$this->_size = $size;
		$this->_id = $id;
		$this->_headerIcon = $headerIcon;
	}
	
	public function addFooterElement($element)
	{
	    if(is_array($element))
	    {
	        foreach ($element as $el)
	        {
	            $this->_footerElements[] = $el;
	        }
	    }
	    else
	    {
	        $this->_footerElements[] = $element;
	    }
	}
	
	public function setRawBodyContent($content)
	{
	    $this->_rawBodyContent = $content;
	}
	
	public function render()
	{
		$this->strBuffer = "";
		$this->strBuffer .= "<div class='modal fade ' id='" . $this->_id . "' role='dialog' tabindex='-1'>
								<div class='modal-dialog " . $this->_size . "' role='document'>
									<div class='modal-content'>";
		
		if($this->_header)
		{
			$this->strBuffer .= "<div class='modal-header '>";
			
			if($this->_headerIcon)
			{
			    $this->strBuffer .= $this->_headerIcon->__tostring() . "&nbsp;&nbsp;&nbsp;";
			}

			
			$this->strBuffer .= "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
			$this->strBuffer .= '<h3 class="modal-title">' . $this->_header . '</h3>';
			
			
			
			//$this->strBuffer .= $this->_header;
			$this->strBuffer .= "</div>";
		}
		
		$this->strBuffer .= "<div class='modal-body'>";
		
		$row = new BsDiv();
		//$row = new BsRow();
		
		foreach($this->elements as $element)
		{
		    $row->addElement($element);
		}
		
		$this->strBuffer .= $row->__tostring();
		
		$this->strBuffer .= $this->_rawBodyContent;
		
		//$this->strBuffer .= "</div>";
		$this->strBuffer .= "</div>";


		
		$this->strBuffer .= "<div class='modal-footer'>";
		
		foreach($this->_footerElements as $element)
		{
		    $this->strBuffer .= $element->__tostring();
		}
		
		$this->strBuffer .= "</div>";

			
		$this->strBuffer .= "</div></div></div>";
	}
	
}