<?php
class BsInputGroup extends BsElement
{
    private $_size;
    private $_placeHolder;
    private $_isAfter;
    private $_label;
    private $_id;
    private $_name;
    
    
    public function __construct($label, $id, $name, $placeHolder = "", $isAfter = false, $size = BsDefinition::INPUT_GROUP_NORMAL)
    {
        $this->_label = $label;
        $this->_id = $id;
        $this->_name = $name;
        $this->_size = $size;
        $this->_placeHolder = $placeHolder;
        $this->_isAfter = $isAfter;
    }
    
    public function setReadOnly()
    {
        $this->addOption('readonly', "");
    }
    
    public function setDisabled()
    {
        $this->addOption('disabled', "");
    }
    
    public function setValue($value)
    {
        $this->_value = $value;
    }
    
    public function getValueAsString()
    {
        if(!empty($this->_value))
        {
            return " value='" . $this->_value . "' ";
        }
        else
        {
            return "";
        }
        
    }
    
    public function render()
    {
        $this->strBuffer = "";
        
        $this->strBuffer .= "<label for='" . $this->_id . "'>" . $this->_label . "</label>";
        $this->strBuffer .= "<div class='input-group " . $this->_size . "'>";
        
        if($this->_isAfter)
        {
            $this->strBuffer .= "<input id='" . $this->_id . "' name='" . $this->_name . "' " . $this->getValueAsString() . " type='text' class='form-control' placeholder='" . $this->_placeHolder . "' " . $this->getOptionsAsString() . ">";
        }
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();
        }
        
        if(!$this->_isAfter)
        {
            $this->strBuffer .= "<input type='text' class='form-control' placeholder='$this->_placeHolder'>";
        }
        
        $this->strBuffer .= "</div>";
    }
}

/*

Sizing classes :
################

.input-group-lg
.input-group-sm

Input with button :
###################

<div class="input-group">
  <input type="text" class="form-control" placeholder="Search for...">
  <span class="input-group-btn">
    <button class="btn btn-default" type="button">Go!</button>
  </span>
</div><!-- /input-group -->





Input with checkbox :
#####################

<div class="input-group">
  <span class="input-group-addon">
    <input type="checkbox" aria-label="...">
  </span>
  <input type="text" class="form-control" aria-label="...">
</div><!-- /input-group -->


Input with dropdown button :
############################

<div class="input-group">
  <div class="input-group-btn">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">Action</a></li>
      <li><a href="#">Another action</a></li>
      <li><a href="#">Something else here</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="#">Separated link</a></li>
    </ul>
  </div><!-- /btn-group -->
  <input type="text" class="form-control" aria-label="...">
</div><!-- /input-group -->




*/
 