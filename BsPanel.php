<?php
class BsPanel extends BsElement
{
    private $_header;
    private $_footer;
    private $_type;
    private $_headerSize;
    private $_footerSize;
    private $_rawBodyContent = "";
    private $_rawHeaderContent = "";
    private $_rawFooterContent = "";
    private $_collapseClassString = "";
    private $_bodyId = "";
    private $_headerIcon = "";
    private $_collapseId = "";
    private $_collapseParentIdAsString = "";
    
    public function __construct($header = false, $footer = false, $type = BsDefinition::PANEL_INFO, $headerSize = "", $footerSize = "")
    {
        $this->_header = $header;
        $this->_footer = $footer;
        $this->_type = $type;
        $this->_headerSize = $headerSize;
        $this->_footerSize = $footerSize;
    }
    
    public function enableCollapse($startUncollapsed = false, $parentId = "")
    {
        $this->_collapseId = BsDefinition::getRandomUniqueId();
        $this->_collapseClassString = "panel-collapse collapse";
        
        if($startUncollapsed)
        {
            $this->_collapseClassString .= " in";
        }
        
        if($parentId)
        {
            $this->_collapseParentIdAsString = "data-parent='#" . $parentId . "'";
        }
    }
            
    public function setBodyId($id)
    {
        $this->_bodyId = "id='" . $id . "'";
    }
    
    public function setId($id)
    {
        $this->addOption("id", $id);
    }
    
    public function setRawBodyContent($content)
    {
        $this->_rawBodyContent = $content;
    }
    
    public function setRawHeaderContent($content)
    {
        $this->_rawHeaderContent = $content;
    }
    
    public function setRawFooterContent($content)
    {
        $this->_rawFooterContent = $content;
    }
    
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<div " . $this->getOptionsAsString() . " class='panel " . $this->_type . "'>";
        
        if($this->_header)
        {
            $this->strBuffer .= "<div class='panel-heading " . $this->_headerSize . "'>";
            
            if($this->_collapseId)
            {
                $this->strBuffer .= "<a data-toggle='collapse' href='#" . $this->_collapseId . "' " . $this->_collapseParentIdAsString . "><span class='" . BsDefinition::GLYPHICON_CHEVRON_DOWN . "'></span>&nbsp;";
            }
            
            $this->strBuffer .= $this->_rawHeaderContent;
            $this->strBuffer .= $this->_header;
            
            
            if($this->_collapseId)
            {
                $this->strBuffer .= "</a>";
            }
            
            $this->strBuffer .= "</div>";
            
            
        }
        
        if($this->_collapseId)
        {
            $this->strBuffer .= "<div id='" . $this->_collapseId . "' class='" . $this->_collapseClassString . "'>";
        }
        
        $this->strBuffer .= "<div class='panel-body' " . $this->_bodyId . ">";

        $this->strBuffer .= $this->_rawBodyContent;
        
        foreach($this->elements as $element)
        {
            $this->strBuffer .= $element->__tostring();
        }
        
        $this->strBuffer .= "</div>";
        
        if($this->_collapseId)
        {
            $this->strBuffer .= "</div>";
        }
        
        if($this->_footer)
        {
            $this->strBuffer .= "<div class='panel-footer " . $this->_footerSize . "'>";
            $this->strBuffer .= $this->_rawFooterContent;
            $this->strBuffer .= $this->_footer;
            $this->strBuffer .= "</div>";
        }
        
        $this->strBuffer .= "</div>";
    }
}