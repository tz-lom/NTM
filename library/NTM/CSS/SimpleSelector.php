<?php

namespace NTM\CSS;

/**
 * Description of SimpleSelector
 *
 * @author tz-lom
 */
class SimpleSelector
{
    /**
     * @var Combinator
     */
    protected $combinator = NULL;
    protected $hash = '';
    protected $classes = array();
    protected $element = '';
    protected $attributes = array();
    protected $pseudo   = array();
    protected $parent = NULL;

    /**
     * @return SimpleSelector 
     */
    static public function instance()
    {
        return new self;
    }
    
    public function setParent($p)
    {
        $this->parent = $p;
    }
    
    public function XPath()
    {
        
    }
    
    /**
     *
     * @param type $class
     * @return SimpleSelector 
     */
    public function addClass($class)
    {
        $this->classes[] = $class;
        return $this;
    }
    
    /**
     *
     * @param type $hash
     * @return SimpleSelector 
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }
    
    /**
     *
     * @param type $element
     * @return SimpleSelector 
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }
    
    /**
     *
     * @param DescendantRelation $el
     * @return SimpleSelector 
     */
    public function setCombinator(Combinator $el)
    {
        $this->combinator = $el;
        $this->combinator->injectParent($this);
        return $this;
    }
    
    /**
     *
     * @param AttributeTest $attr
     * @return SimpleSelector 
     */
    public function addAttribute(AttributeTest $attr)
    {
        $sthis->attributes[] = $attr;
        return $this;
    }
    
    public function addPseudoClass(PseudoClass $class)
    {
        $this->pseudo[] = $class;
        return $this;
    }
    
    public function merge(SimpleSelector $s)
    {
        $this->hash = $s->hash!=''?$s->hash:$this->hash;
        $this->element = $s->element!=''?$s->element:$this->element;
        $this->attributes = array_merge($this->attributes,$s->attributes);
        $this->classes = array_merge($this->classes,$s->classes);
        $this->pseudo = array_merge($this->pseudo,$s->pseudo);
        return $this;
    }
    
    public function getRoot()
    {
        if($this->parent)
        {
            return $this->parent->getRoot();
        }
        else
        {
            return $this;
        }
    }
}

