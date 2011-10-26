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
    protected $namespace;
    
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
}

