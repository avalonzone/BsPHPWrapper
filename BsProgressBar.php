<?php
class BsProgressBar extends BsElement
{
    private $_type;
    private $_text;
    private $_hide;
    private $_valueNow;
    private $_valueMin;
    private $_valueMax;
    private $_style;
    private $_showPercentage;
    
    public function __construct($valueNow, $text="", $hide=false, $auto=true, $valueMin=0, $valueMax=100, $type=BsDefinition::PROGRESS_BAR_INFO, $style="", $showPercentage = true)
    {
        $this->_type = $type;
        $this->_text = $text;
        $this->_hide = $hide;
        $this->_valueNow = $valueNow;
        $this->_valueMin = $valueMin;
        $this->_valueMax = $valueMax;
        $this->_style = $style;
        $this->_showPercentage = $showPercentage;
        
        $this->addOption("aria-valuenow",$valueNow);
        $this->addOption("aria-valuemin",$valueMin);
        $this->addOption("aria-valuemax",$valueMax);
        $this->addOption("role","progressbar");
        $this->addOption("style","width:" . $this->_valueNow . "%");
        
        $this->addClass("progress-bar");
        
        if($auto)
        {
            $this->getAutoStyle();
        }
        
        $this->addClass($this->_type);
                
    }
    
    private function getAutoStyle()
    {
        if($this->_valueNow <= ($this->_valueMax - ($this->_valueMax * 0.75)))
        {
            $this->_type = BsDefinition::PROGRESS_BAR_DANGER;
        }
        elseif($this->_valueNow <= ($this->_valueMax - ($this->_valueMax * 0.5)))
        {
            $this->_type = BsDefinition::PROGRESS_BAR_WARNING;
        }
        elseif($this->_valueNow <= ($this->_valueMax - ($this->_valueMax * 0.25)))
        {
            $this->_type = BsDefinition::PROGRESS_BAR_INFO;
        }
        elseif($this->_valueNow >= $this->_valueMax)
        {
            $this->_type = BsDefinition::PROGRESS_BAR_SUCCESS;
        }
    }
    
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<div class='progress'  >";       
        $this->strBuffer .= "<div class='" . $this->getClassesAsString() . "' " . $this->getOptionsAsString() . ">";
        
        if(!$this->_text)
        {
            $this->_text =  $this->_valueNow . "%";
        }
        
        if($this->_hide)
        {
            $this->strBuffer .= "<span class='sr-only'>" . $this->_text . "</span>";
        }
        else
        {
            $this->strBuffer .= $this->_text;
        }
        
        $this->strBuffer .= "</div>";
        $this->strBuffer .= "</div>";
    }
}