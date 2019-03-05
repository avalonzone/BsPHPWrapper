<?php
class BsFormCheckbox extends BsElement
{
    private $_label;
    private $_id;
    private $_value;
    private $_isChecked;
    private $_isDisabled;
    private $_isReadonly = false;
    private $_isInline = false;
    private $_size;
    private $_validatorString;
    private $_hasValidator = false;
    private $_isRequired;
    private $_name;
    
    public function __construct(    $label, 
                                    $id, 
                                    $value = "", 
                                    $isChecked = false,
                                    $isDisabled = false,
                                    $size = BsDefinition::FORMGROUP_SIZE_SMALL )
    {
        $this->_label = $label;
        $this->_id = $id;
        $this->_value = $value;
        $this->_isChecked = $isChecked;
        $this->_isDisabled = $isDisabled;
        $this->_size = $size;
        $this->_name = $id;
        
        $this->_init();
        
    }
    
    private function _init()
    {
        $this->addOption("id", $this->_id);
        $this->addOption("name", $this->_id);
        //$this->addOption("value", $this->_value);
        $this->addOption("data-validate", "true");
        
        //$this->addClass("form-group");
        $this->addClass($this->_size);
    }
    
    public function setValidator(   $errorMessage = false,
        $pattern = false,
        $remoteValidator = false,
        $isRequired = false,
        $minlength=false,
        $patternErrorMessage = false,
        $requiredErrorMessage = false,
        $matchErrorMessage = false)
        
    {
        $this->_hasValidator = true;
        $this->_validatorString = "";
        
        if(!empty($errorMessage))
        {
            //$this->_validatorString .= " data-error='" . $errorMessage . "'";
            $this->addOption("data-error", $errorMessage);
        }
        
        if(!empty($pattern))
        {
            //$this->_validatorString .= " pattern='" . $pattern . "'";
            $this->addOption("pattern", $pattern);
        }
        
        if(!empty($remoteValidator))
        {
            //$this->_validatorString .= " data-remote='" . $remoteValidator . "'";
            $this->addOption("data-remote", $remoteValidator);
        }
        
        if(!empty($minlength))
        {
            //$this->_validatorString .= " data-minlength'" . $minlength . "'";
            $this->addOption("data-minlength", $minlength);
        }
        
        if(!empty($patternErrorMessage))
        {
            //$this->_validatorString .= " data-pattern-error='" . $patternErrorMessage . "'";
            $this->addOption("data-pattern-error", $patternErrorMessage);
        }
        
        if(!empty($requiredErrorMessage))
        {
            //$this->_validatorString .= " data-required-error='" . $requiredErrorMessage . "'";
            $this->addOption("data-required-error", $requiredErrorMessage);
        }
        
        if(!empty($matchErrorMessage))
        {
            //$this->_validatorString .= " data-match-error='" . $matchErrorMessage . "'";
            $this->addOption("data-match-error", $matchErrorMessage);
        }
        
        if($isRequired)
        {
            $this->_isRequired = $isRequired;
        }
    }
    
    public function setAsToggle($labelA, $labelB, $size = BsDefinition::FORMCONTROL_TOGGLE_LARGE)
    {
        $this->addOption("data-toggle", "toggle");
        $this->addOption("data-off", $labelB);
        $this->addOption("data-on", $labelA);
        $this->addOption("data-size", $size);
    }
    
    public function setIsReadOnly()
    {
        $this->_isReadonly = true;
        //$this->addOption("readonly", "true");
    }
    
    public function getIsReadOnlyAsString()
    {
        if($this->_isReadonly)
        {
            return "readonly";
        }
        else
        {
            return "";
        }
         
    }
    
    public function getIsRequiredAsString()
    {
        if($this->_isRequired)
        {
            return "required";
        }
        else
        {
            return "";
        }
    }
    
    public function setIsChecked($isChecked)
    {
        $this->_isChecked = $isChecked;
    }
    
    public function getIsCheckedAsString()
    {
        if($this->_isChecked)
        {
            return "checked";
        }
        else
        {
            return "";
        }
    }
    
    public function setIsDisabled($isDisabled)
    {
        $this->_isDisabled = $isDisabled;
    }
    
    public function getIsDisabledAsString()
    {
        if($this->_isDisabled)
        {
            return "disabled";
        }
        else
        {
            return "";
        }
    }
    
    public function setIsInLine()
    {
        $this->_isInline = true;
    }
    
    public function getIsInlineAsString()
    {
        if($this->_isInline)
        {
            return "checkbox-inline";
        }
        else
        {
            return "checkbox";
        }
    }
    
    public function render()
    {
        $this->strBuffer = "";
        //Removed "has-feedback" -> no use if not required
        $this->strBuffer .= "<div class='form-group " . $this->_size . "'>";
        if($this->_isHorizontal){
            $this->strBuffer .= "<div class=' '>";
            $this->strBuffer .= "<label class ='control-label col-md-2' for='$this->_id'>$this->_label</label>";
            $this->strBuffer .= "<div class='col-md-10'>";
            $this->strBuffer .= "<input " . $this->tooltip . " " . $this->_validatorString . " type='checkbox' id='" . $this->_id . "' " . $this->getOptionsAsString() . " " . $this->getIsCheckedAsString(). " " . $this->getIsReadOnlyAsString() . " " . $this->getIsRequiredAsString() . " " . $this->getIsDisabledAsString() . ">";
            $this->strBuffer .= "</div>";
        }
        else{
            $this->strBuffer .= "<div class='" . $this->getIsInlineAsString() . "'>";
            $this->strBuffer .= "<label>";
            $this->strBuffer .= "<input " . $this->tooltip . " " . $this->_validatorString . " type='checkbox' id='" . $this->_id . "' " . $this->getOptionsAsString() . " " . $this->getIsCheckedAsString(). " " . $this->getIsReadOnlyAsString() . " " . $this->getIsRequiredAsString() . " " . $this->getIsDisabledAsString() . ">";
            
            $this->strBuffer .= $this->_label;
            $this->strBuffer .= "</label>";
        }
        $this->strBuffer .= "</div>";
        $this->strBuffer .= "</div>";
        
        
    }
}