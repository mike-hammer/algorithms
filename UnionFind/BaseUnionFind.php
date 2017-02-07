<?php

/**
 * Created by PhpStorm.
 * User: mlavrik
 * Date: 07.02.17
 * Time: 23:10
 */
abstract class BaseUnionFind
{
    protected $nodes = array();

    /**
     * UnionFind constructor.
     * @param $size - number of nodes in a list
     */
    function __construct(int $size)
    {
        for($i = 0; $i < $size; $i++){
            $this->nodes[$i] = $i;
        }
    }

    public function __toString()
    {
        return print_r($this->nodes, true);
    }

    abstract public function isConnected(int $x, int $y) : bool;
    abstract public function union(int $x, int $y);
}