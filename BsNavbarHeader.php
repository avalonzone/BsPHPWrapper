<?php
class BsNavbarHeader extends BsElement
{
	private $_headerText;
	private $_bsImage;
	
	public function __construct($bsImage = null, $headerText = "")
	{
	    $this->_headerText = $headerText;
		$this->_bsImage = $bsImage;
	}
	
	public function render()
	{
	    $bsImage = '';
	    if($this->_bsImage != null){
	        $bsImage = $this->_bsImage->__tostring();
	    }
	    $this->strBuffer = "";
		$this->strBuffer .= "<div class='navbar-header'>";
		$this->strBuffer .= "<a class='navbar-brand'  href='#' onclick='reload()' " . $this->getOptionsAsString() . " title='" . $this->_headerText . "'>";
		$this->strBuffer .= $bsImage;
		$this->strBuffer .= "</a>";
		$this->strBuffer .= "<a class='navbar-brand'  href='#' onclick='reload()' " . $this->getOptionsAsString() . " title='" . $this->_headerText . "'>";
		$this->strBuffer .= $this->_headerText;
		$this->strBuffer .= "</a>";
	    $this->strBuffer .= "</div>";
	}
}