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
    protected $namespace = NULL;
    
    public function __construct($attr,$test=NULL,$value=NULL)
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
            if($this->testcase===NULL)
            {
                return $el->hasAttributeNS($this->namespace,$this->attr);
            }
            
            $value = $el->getAttributeNS($this->namespace, $this->attr);
        }
        else
        {
            if($this->testcase===NULL)
            {
                return $el->hasAttribute($this->attr);
            }
            
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
                if($this->value=='') return false;
                if(substr($this->value,-strlen($value))!=$value)
                {
                    return false;
                }
                break;
            case '^=':
                if($this->value=='') return false;
                if(substr($this->value,0,strlen($value))!==$value)
                {
                    return false;
                }
                break;
            case '*=':
                if(substr($this->value,$value)===false)
                {
                    return false;
                }
                break;
            case '|=':
                if($this->value!=$value)
                {
                    if(substr($this->value,0,strlen($value)+1)!==$value.'-')
                    {
                        return false;
                    }
                }
                break;

            default:
                return false;
                break;
        }
        return true;
    }
}

