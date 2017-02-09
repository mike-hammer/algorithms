<?php

/**
 * Weighted Quick Union implementation
 */
class WeightedQuickUnion extends BaseUnionFind
{
    private $height = array();

    function __construct(int $size)
    {
        parent::__construct($size);

        for($i = 0; $i < $size; $i++){
            $this->height[$i] = 1;
        }
    }

    /**
     * Validate node number
     * @param int $x
     * @throws Exception
     */
    function validate(int $x){
        if($x < 0 || $x >= count($this->nodes)){
            throw new Exception('Invalid node id: ' . $x);
        }
    }
    /**
     * Find root for given node
     * @param $x
     * @return int
     */
    public function find(int $x) : int
    {
        $this->validate($x);
        while($x != $this->nodes[$x]) {
            $this->nodes[$x] = $this->nodes[$this->nodes[$x]]; // path compression
            $x = $this->nodes[$x];
        }
        return $x;
    }


    /**
     * Check if $x connected with $y
     * @param $x - first node
     * @param $y - second node
     * @return bool
     */
    public function isConnected(int $x, int $y) : bool
    {
        return $this->find($x) == $this->find($y);
    }

    /**
     * Link $x and $y nodes
     * @param $x - first node
     * @param $y - second node
     */
    public function union(int $x, int $y)
    {
        $xRoot = $this->find($x);
        $yRoot = $this->find($y);

        if($xRoot == $yRoot) return;

        if($this->height[$xRoot] < $this->height[$yRoot]){
            $this->nodes[$xRoot] = $yRoot;
            $this->height[$yRoot] += $this->height[$xRoot];
        } else {
            $this->nodes[$yRoot] = $xRoot;
            $this->height[$xRoot] += $this->height[$yRoot];
        }
    }

}