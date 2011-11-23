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
    protected $hash = NULL;
    protected $classes = array();
    protected $element = NULL;
    protected $attributes = array();
    protected $pseudo   = array();
    protected $namespace = NULL;

    /**
     * @return SimpleSelector 
     */
    static public function instance()
    {
        return new self;
    }
    
    public function XPath()
    {
        //
        //  //div[@id]
        //
        
        $xpath = '//';
        
        if($this->namespace)
        {
            $xpath.=$this->namespace.':';
        }
        
        if($this->element)
        {
            $xpath.=$this->element;
        }
        else
        {
            $xpath.='*';
        }
        
        if($this->hash)
        {
            $xpath.="[@id='$this->hash']";
        }
        return $xpath;
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
        return $this;
    }
    
    /**
     *
     * @param AttributeTest $attr
     * @return SimpleSelector 
     */
    public function addAttribute(AttributeTest $attr)
    {
        $this->attributes[] = $attr;
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
    
    /**
     *
     * @param type $namespace
     * @return SimpleSelector 
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }
    
    /**
     *
     * @param \DOMElement $el
     * @return boolean
     */
    public function check(\DOMElement $el)
    {
        if($this->hash)
        {
            if($el->getAttribute('id')!=$this->hash)
            {
                return false;
            }
        }
        if($this->element)
        {
            if($this->element!='*' && $el->tagName!=$this->element)
            {
                return false;
            }
        }
        if($this->classes)
        {
            $classes = explode(' ',$el->getAttribute('class'));
            if(count(array_diff($this->classes,$classes))>0)
            {
                return false;
            }
        }
        if($this->attributes)
        {
            foreach($this->attributes as $attr)
            {
                if(!$attr->check($el))
                {
                    return false;
                }
            }
        }
        if($this->pseudo)
        {
            foreach($this->pseudo as $pseudo)
            {
                if(!$pseudo->check($el))
                {
                    return false;
                }
            }
        }
        
        if($this->combinator)
        {
            return $this->combinator->check($el);
        }
        else
        {
            return true;
        }
    }
}

