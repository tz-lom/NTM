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
    
    public function __construct($attr,$test,$value,$ext=NULL)
    {
        $this->attr = $attr;
        $this->testcase = $test;
        $this->value = $value;
        $this->ext = $ext;
    }
}

