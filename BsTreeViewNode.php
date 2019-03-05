<?php
class BsTreeViewNode
{
    public $text;
    public $icon;
    public $selectedIcon;
    public $href;
    public $tags = array();
    public $nodes = array();
    public $nodeDataProperties = array();
    
    public function __construct(string $text, array $nodeDatas = array())
    {
        $this->text = $text;
        $this->nodeDataProperties = $nodeDatas;
    }
    
    public function addNodeDataProperty($key, $value)
    {
        $this->nodeDataProperties[$key] = $value;
    }
    
    public function addTag(string $tag)
    {
        $this->tags[] = $tag;
    }
    
    public function addNode(BsTreeViewNode $node)
    {
        $this->nodes[] = $node;
    }
    
    public function addNodes(array $nodes)
    {
        foreach ($nodes as $node)
        {
            $this->nodes[] = $node;
        }
    }
    
}