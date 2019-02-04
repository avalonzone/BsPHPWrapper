<?php
//require(__DIR__ . "\\" . "BsElement.php");

class BsPreBuildDataTable extends BsElement
{
    private $_id;
    private $_datas;
    
    public function __construct($id, array $datas)
    {
        $this->_id = $id;
        $this->_datas = $datas;
    }
    
    public function render()
    {
        $Table = new BsTable($this->_id, $this->_datas);                   
        $this->strBuffer = $Table->__tostring();
    }
    
}