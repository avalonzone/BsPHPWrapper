<?php
//require(__DIR__ . "\\" . "BsElement.php");

class BsImage extends BsElement
{
    private $_fileLocation;
    private $_width;
    private $_height;
    private $_id;
    
    public function __construct(    $fileLocation,
                                    $width,
                                    $height)
    {
        $this->_fileLocation = $fileLocation;
        $this->_width = $width;
        $this->_height = $height; 
    }
    
    public function setId($id)
    {
        $this->_id =  "id='" . $id . "' ";
    }
    
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<img width='" . $this->_width . "' " . $this->_id . "height='" . $this->_height . "' src='" . $this->_fileLocation . "'/>";
    }
    
}