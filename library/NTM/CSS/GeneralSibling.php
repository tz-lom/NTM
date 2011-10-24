<?php

namespace NTM\CSS;

/**
 * div ~ p
 *
 * @author tz-lom
 */
class GeneralSibling extends Combinator
{
    public function XPath()
    {
        return '/*/'.$this->selector->XPath();
    }
}

