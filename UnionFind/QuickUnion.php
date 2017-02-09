<?php
/**
 * Quick Union implementation
 */
class QuickUnion extends BaseUnionFind
{
    /**
     * Find root for given node
     * @param $x
     * @return int
     */
    public function root(int $x) : int
    {
        while($x != $this->nodes[$x]) $x = $this->nodes[$x];
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
        return $this->root($x) == $this->root($y);
    }
    /**
     * Link $x and $y nodes
     * @param $x - first node
     * @param $y - second node
     */
    public function union(int $x, int $y)
    {
        $xRoot = $this->root($x);
        $yRoot = $this->root($y);
        $this->nodes[$xRoot] = $yRoot;
    }
}