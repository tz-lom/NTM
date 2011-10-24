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
    
    abstract public function XPath();
    
    public function __construct(SimpleSelector $selector)
    {
        $this->selector = $selector;
    }
    
    public function injectParent($el)
    {
        $this->selector->setParent($el);
    }
    
}

