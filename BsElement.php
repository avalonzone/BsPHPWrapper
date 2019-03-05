<?php
/**
 * This Abstract class is the base class of all Bs classes.
 * 
 * Any change to this class should be well evaluated before proceeding
 * 
 */
abstract class BsElement
{
    protected $strBuffer = "";
    protected $options = array();
    protected $elements = array();
    protected $tooltip = "";
    protected $isColumn = false;
    protected $bsColsize;
    protected $bsColsizeClass;
    protected $classes = array();
    protected $alignement = "";
    protected $elementId = "";
    protected $_isHorizontal = false;
    
    public function setAsColumn($size, $offset = 0, $sizeClass = BsDefinition::COL_CLASS_MEDIUM)
    {
        $this->isColumn = true;
        $this->addClass($sizeClass . $size);
        $this->addClass($sizeClass . "offset-" . $offset);
    }
    
    public function addOption($key, $value = null)
    {
        if(is_array($key))
        {
            foreach ($key as $optionKey=>$optionValue)
            {
                $this->options[strtolower($optionKey)] = $optionValue;
            }
        }
        else
        {
            $this->options[strtolower($key)] = $value;
        }
    }
    
    public function addElementId($elementId)
    {
        $this->elementId = "id='" . $elementId . "'";
    }
    
    public function setRight()
    {
        $this->alignement = "pull-right";
    }
    
    public function setLeft()
    {
        $this->alignement = "pull-left";
    }
    
    public function addElement($element)
    {
        if(is_array($element))
        {
            foreach ($element as $el)
            {
                $this->elements[] = $el;
            }
        }
        else
        {
            $this->elements[] = $element;
        }
    }
    
    public function addClass($class)
    {
        if(is_array($class))
        {
            foreach ($class as $el)
            {
                $this->classes[] = $el;
            }
        }
        else
        {
            $this->classes[] = $class;
        }
    }
    
    public function getClassesAsString()
    {
        $strClasses = "";
        foreach ($this->classes as $class)
        {
            $strClasses .= " " . $class;
        }
        return $strClasses;
    }
        
    public function addTooltip($text, $position = BsDefinition::TOOLTIP_BOTTOM, $isHTML = false)
    {
        $this->tooltip = "data-container='body' data-toggle='tooltip' data-html='" . $isHTML . "' title='" . $text . "' data-placement='" . $position . "'";
    }
    
    abstract public function render();
    
    public function setHorizontal(){
        $this->_isHorizontal = true;
    }
    
    public function getOptionsAsString()
    {
        $strOptions = "";
        foreach ($this->options as $key=>$value)
        {
            if(preg_split("/'/", $value))
            {
                $strOptions .= ' ' . strtolower($key) . '="' . $value . '"';
            }
            else
            {
                $strOptions .= " " . strtolower($key) . "='" . $value . "'";
            }
            
        }
        return $strOptions;
    }
    
    public function __tostring()
    {
        if($this->isColumn)
        {
            $this->render();
            $renderedBuffer = $this->strBuffer;
            $this->strBuffer = "";
            $this->strBuffer .= "<div " . $this->elementId . " class='" . $this->getClassesAsString() . "' >";
            $this->strBuffer .= $renderedBuffer;
            $this->strBuffer .= "</div>";
            return $this->strBuffer;
        }
        else
        {
            $this->render();
            return $this->strBuffer;
        }
    }
}