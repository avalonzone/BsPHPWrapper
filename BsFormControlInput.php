<?php
class BsFormControlInput extends BsElement
{
    private $_label;
    private $_id;
    private $_name;
    private $_type;
    private $_placeHolder;
    private $_size;
    private $_helpMessage;
    private $_readOnly;
    private $_isDisabled;
    private $_isRequired;
    private $_plainText;
    private $_helpId;
    private $_validatorString;
    private $_value;
    //private $_isHorizontal = false;
    private $_hasValidator = false;
    
    public function __construct(    $label, 
                                    $id,
                                    $name,
                                    $type, 
                                    $placeHolder = "", 
                                    $helpMessage = "", 
                                    $size = BsDefinition::FORMGROUP_SIZE_NORMAL, 
                                    $isDisabled = false, 
                                    $readOnly = false, 
                                    $plainText = false)
    {
        $this->_label = $label;
        $this->_id = $id;
        $this->_name = $name;
        $this->_type = $type;
        $this->_placeHolder = $placeHolder;
        $this->_size = $size;
        $this->_helpMessage = $helpMessage;
        $this->_readOnly = $readOnly;
        $this->_isDisabled = $isDisabled;
        $this->_plainText = $plainText;
        $this->_helpId = $this->_id . "Help";
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
            $this->_validatorString .= " data-error='" . $errorMessage . "'";
        }
        
        if(!empty($pattern))
        {
            $this->_validatorString .= " pattern='" . $pattern . "'";
        }
        
        if(!empty($remoteValidator))
        {
            $this->_validatorString .= " data-remote='" . $remoteValidator . "'";
        }
        
        if(!empty($minlength))
        {
            $this->_validatorString .= " data-minlength'" . $minlength . "'";
        }
        
        if(!empty($patternErrorMessage))
        {
            $this->_validatorString .= " data-pattern-error='" . $patternErrorMessage . "'";
        }
        
        if(!empty($requiredErrorMessage))
        {
            $this->_validatorString .= " data-required-error='" . $requiredErrorMessage . "'";
        }
        
        if(!empty($matchErrorMessage))
        {
            $this->_validatorString .= " data-match-error='" . $matchErrorMessage . "'";
        }
        
        if($isRequired)
        {
            $this->_isRequired = $isRequired;
        }
    }
    
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<div class='form-group has-feedback " . $this->_size . "'>";
        $controlLabel = "";
        if(strlen($this->_label) > 0){
            if($this->_isHorizontal){
                // TODO : Code Horizontal (ajout DIV)
                $controlLabel = "class = 'col-md-2 control-label'";
            }
            
            $this->strBuffer .= "<label $controlLabel for='" . $this->_id . "'>" . $this->_label . "</label>";
        }
        
        $stateString = "";
        
        if($this->_isRequired)
        {
            $stateString = 'required';
        }
        else
        {
            if(!($this->_isDisabled == true && $this->_readOnly == true))
            {
                if($this->_readOnly) { $stateString = "readonly"; }
                if($this->_isDisabled) { $stateString = "disabled"; }
            }
        }
        
        $plainTextString = "";
        if($this->_plainText) { $plainTextString = "-plaintext"; }
        if($this->_isHorizontal){
            $this->strBuffer .= '<div class = "col-md-10">';
        }
        $this->strBuffer .= "<input " . $this->tooltip . " name='" . $this->_name . "' " . $this->_validatorString . " type='" . $this->_type . "' placeholder='" . $this->_placeHolder . "' class='form-control" . $plainTextString . " " . $this->_size . "' id='" . $this->_id . "' aria-describedby='" . $this->_helpId . "' " . $this->getOptionsAsString() . " " . $stateString . " " . $this->getValueAsString() . ">";
        if($this->_isHorizontal){$this->strBuffer .= '</div>';}
        if(strlen($this->_helpMessage) > 0 || $this->_hasValidator){
            $this->strBuffer .= "<small id='" . $this->_helpId . "' class='form-text text-muted'>" . $this->_helpMessage . "</small>";
        }
        
        $this->strBuffer .= "<span class='glyphicon form-control-feedback' aria-hidden='true'></span>";
        
        if(strlen($this->_helpMessage) > 0 || $this->_hasValidator){
            $this->strBuffer .= "<div class='help-block with-errors'></div>";
            $this->strBuffer .= "<div class='help-block with-warning'></div>";
        }
        
        $this->strBuffer .= "</div>";
    }
}