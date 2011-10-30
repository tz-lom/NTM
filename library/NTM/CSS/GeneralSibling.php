<?php

namespace NTM\CSS;

/**
 * div ~ p
 *
 * @author tz-lom
 */
class GeneralSibling extends Combinator
{
    public function check(\DOMElement $el)
    {
        return '/*/'.$this->selector->XPath();
    }
}

