<?php

namespace NTM\CSS;

/**
 * Description of AttributeTest
 *
 * @author tz-lom
 */
class AttributeTest
{
    protected $attr;
    protected $value;
    protected $testcase;
    protected $ext;
    protected $namespace = NULL;
    
    public function __construct($attr,$test,$value,$ext=NULL)
    {
        if(is_array($attr))
        {
            $this->namespace = $attr[0];
            $this->attr = $attr[1];
        }
        else
        {
            $this->attr = $attr;
        }
        $this->testcase = $test;
        $this->value = $value;
        $this->ext = $ext;
    }
    
    /**
     *
     * @param \DOMElement $el 
     * @return boolean
     */
    public function check(\DOMElement $el)
    {
        if($this->namespace)
        {
            $value = $el->getAttributeNS($this->namespace, $this->attr);
        }
        else
        {
            $value = $el->getAttribute($this->attr);
        }
        
        switch($this->testcase)
        {
            case '=':
                if($this->value!=$value)
                {
                    return false;
                }
                break;
            case '~=':
                if($this->value=='') return false;
                if(count(array_diff(array($value),explode(' ',$value)))==0)
                {
                    return false;
                }
                break;
            case '$=':
                if($this->value!=$value)
                {
                    return false;
                }
                break;
            case '^=':
                if($this->value!=$value)
                {
                    return false;
                }
                break;
            case '*=':
                if($this->value!=$value)
                {
                    return false;
                }
                break;
            case '|=':
                if($this->value!=$value)
                {
                    return false;
                }
                break;

            default:
                return false;
                break;
        }
        return true;
    }
}

