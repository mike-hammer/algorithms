<?php

/**
 *
 * Quick Find implementation
 *
 */
class QuickFind extends BaseUnionFind
{
    /**
     * Check if $x connected with $y
     * @param $x - first node
     * @param $y - second node
     * @return bool
     */
    public function isConnected(int $x, int $y) : bool
    {
        return $this->nodes[$x] == $this->nodes[$y];
    }

    /**
     * Link $x and $y nodes
     * @param $x - first node
     * @param $y - second node
     */
    public function union(int $x, int $y)
    {
        $xId = $this->nodes[$x];
        $yId = $this->nodes[$y];

        for($i = 0; $i < count($this->nodes); $i++){
            if($this->nodes[$i] == $xId){
                $this->nodes[$i] = $yId;
            }

        }

    }

}