<?php

namespace NTM\CSS;

/**
 * Description of DescendantRelation
 *
 * @author tz-lom
 */
abstract class Combinator
{
    /**
     *
     * @var SimpleSelector
     */
    protected $selector;
    
    abstract public function check(\DOMElement $el);
    
    public function __construct(SimpleSelector $selector)
    {
        $this->selector = $selector;
    }
    
}

