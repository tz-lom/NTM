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
        while($p=$el->previouseSibling)
        {
            if($p instanceof \DOMElement && $this->selector->check($p))
                return true;
        }
        return false;
    }
}

