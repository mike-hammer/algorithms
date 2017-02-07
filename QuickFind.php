<?php

/**
 *
 * Quick Find implementation
 *
 */
class QuickFind
{
    private $nodes = array();

    /**
     * QuickFind constructor.
     * @param $size - number of nodes in a list
     */
    function __construct($size)
    {
        for($i = 0; $i < $size; $i++){
            $this->nodes[$i] = $i;
        }
    }

    /**
     * Check if $x connected with $y
     * @param $x - first node
     * @param $y - second node
     * @return bool
     */
    public function isConnected($x, $y)
    {
        return $this->nodes[$x] == $this->nodes[$y];
    }

    /**
     * Link $x and $y nodes
     * @param $x - first node
     * @param $y - second node
     */
    public function union($x, $y)
    {
        $xId = $this->nodes[$x];
        $yId = $this->nodes[$y];

        for($i = 0; $i < count($this->nodes); $i++){
            if($this->nodes[$i] == $xId){
                $this->nodes[$i] = $yId;
            }

        }

    }

    public function __toString()
    {
        return print_r($this->nodes, true);
    }

}