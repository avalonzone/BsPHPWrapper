<?php
class BsFormCombobox extends BsElement
{
    private $_name;
    private $_label;
    private $_items = array();
    private $_size;
    private $_readOnly;
    private $_isDisabled;
    private $_isRequired;
    private $_isMultiple;
    private $_selectedKey;
    
    
    public function __construct($name, $label, $items, $size, $isDisabled=false, $selectedKey = false)
    {
        $this->_name = $name;
        $this->_label = $label;
        $this->_items = $items;
        $this->_size = $size;
        $this->_isDisabled = $isDisabled;
        $this->_selectedKey = $selectedKey;
    }
    
    public function setAsMultiple()
    {
        $this->_isMultiple = true;
    }
    
    public function addItem($key, $value)
    {
        $this->_items[strtolower($key)] = $value;
    }
    
    public function render()
    {
        $stateString = "";
        $multipleString = "";
        $horizontalClass = "";
        $oldSelectKey = '';
        if($this->_isDisabled) { $stateString = "disabled"; }
        if($this->_isMultiple) { $multipleString = "multiple"; }
        
        $this->strBuffer  = "";
        $this->strBuffer .= "<div class='form-group'>";
        if($this->_label != null)
        {
            if($this->_isHorizontal){
                //TODO : si pas de label et Horizontal, risque de poser problème. ajouter une div vide dela même taille ???
                $horizontalClass = "col-md-2";
            }
            $this->strBuffer .= "<label class='control-label $horizontalClass'>" . $this->_label . "</label>";
        }
        if($this->_isHorizontal){
            $horizontalClass = "col-md-10";
        }
        if($this->_selectedKey){
            $oldSelectKey = "data-oldValue='$this->_selectedKey'";
        }
        
        $this->strBuffer .= "<div class='selectContainer $horizontalClass'>";
        
        
        $this->strBuffer .= "<select " . $multipleString . " " . $this->tooltip . " class='form-control' " . $this->getOptionsAsString() ." ". $oldSelectKey ." name='" . $this->_name . "' " . $stateString . ">";
        
        //OLD
        /*foreach ($this->_items as $key => $value)
        {
            if(is_array($value))
            {
                $optionString = "";
                if($value[1] == false)
                {
                    $optionString = "disabled";
                }
                $this->strBuffer .= "<option value='" . $key . "' " . $optionString . ">" . $value[0] . "</option>";
            }
            else
            {
                $this->strBuffer .= "<option value='" . $key . "'>" . $value . "</option>";
            }
        }*/
        
        foreach ($this->_items as $key => $value)
        {
            $disabledString = "";
            $selectedString = "";
            $text = $value;
            
            
            if(is_array($value))
            {
                if($value[1] == false)
                {
                    $disabledString = "disabled";
                }
                $text = $value[0];
                
            }elseif(is_object($value)){
                $array = get_object_vars($value);
                $properties = array_values($array);
                $text = $properties[1];
                $key = $properties[0];
            }
            
            
            if($key == $this->_selectedKey){
                $selectedString = "selected";
            }
            //CoreHelper::var_dumpF($value);
            $this->strBuffer .= "<option value='" . $key . "' " . $disabledString . " " . $selectedString . ">" . $text . "</option>";
            
        }
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();
        }
        
        $this->strBuffer .= "</select>";
        //if($this->_isHorizontal){$this->strBuffer .= "</div";}
        $this->strBuffer .= "</div>";
        $this->strBuffer .= "</div>";
    }
}