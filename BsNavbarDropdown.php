<?php
class BsNavbarDropdown extends BsElement {
	
	private $_header;
	
	public function __construct($header){
		$this->_header = $header;
	}
	
	public function render(){
		$this->strBuffer = '<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
        $this->strBuffer .= $this->_header;
        $this->strBuffer .= ' <span class="caret"></span></a>';
		$this->strBuffer .= '<ul class="dropdown-menu">';

		foreach($this->elements as $element)
        {
            if(get_class($element) == "BsDropdownSeparator")
            {
                $this->strBuffer .= "<li role='separator' class='divider'>" . $element->__tostring() . "</li>";
            }
            else
            {
                if(property_exists($element,"isDisabled") && $element->isDisabled == true)
                {
                    $this->strBuffer .= "<li class='disabled'>" . $element->__tostring() . "</li>";
                }
                else
                {
                    $this->strBuffer .= "<li>" . $element->__tostring() . "</li>";
                }
                
            }
        }

		$this->strBuffer .= '</ul>';
		
	}
	
}

/*
 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> 
 * */