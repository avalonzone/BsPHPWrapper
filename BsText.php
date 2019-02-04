<?php
class BsText extends BsElement
{
		private $_text;
	
		public function __construct($text)
		{
			$this->_text = $text;
		}
		
		public function render()
		{
		    $this->strBuffer = "<p>";
			$this->strBuffer .= $this->_text;
			$this->strBuffer .= "</p>";
		}		
}