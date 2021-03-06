<?php

namespace Highco\TimelineBundle\Timeline;

/**
 * Collection
 *
 * @package HighcoTimelineBundle
 * @version 1.0.0
 * @author Stephane PY <py.stephane1(at)gmail.com>
 */
class Collection implements \Countable, \IteratorAggregate, \ArrayAccess
{
    protected $coll;
    //this variable is useful coz filter may modify length of the collection
    protected $initial_count = 0;

    /**
     * __construct
     *
     * @param array $coll
     * @return void
     */
    public function __construct(array $coll)
    {
        $this->coll = $coll;
        //this variable is useful coz filter may modify length of the collection
        $this->initial_count = count($this->coll);
    }

    /**
     * getIterator
     *
     * @return void
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->coll);
    }

    /**
     * offsetExists
     *
     * @param mixed $offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->coll[$offset]);
    }

    /**
     * offsetGet
     *
     * @param mixed $offset
     * @return void
     */
    public function offsetGet($offset)
    {
        return $this->coll[$offset];
    }

    /**
     * offsetSet
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->coll[$offset] = $value;
    }

    /**
     * offsetUnset
     *
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->coll[$offset]);
    }

    /**
     * count
     *
     * @return integer
     */
    public function count()
    {
        return count($this->coll);
    }

    /**
     * getInitialCount
     *
     * @return integer
     */
    public function getInitialCount()
    {
        return $this->initial_count;
    }
}
