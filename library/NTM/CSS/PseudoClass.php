<?php

namespace NTM\CSS;

/**
 * Description of PseudoClass
 *
 * @author tz-lom
 */
class PseudoClass
{
    protected $name;
    protected $param;
    
    public function __construct($name,$param=NULL)
    {
        $this->name = $name;
        $this->param = $param;
    }
}

