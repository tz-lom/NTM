<?php

namespace NTM\CSS;
/**
 * div p
 *
 * @author tz-lom
 */
class Descendant extends Combinator
{
    public function check(\DOMElement $el)
    {
        $p = $el;
        while(($p=$p->parentNode) && ($p instanceof \DOMElement))
        {
            if($this->selector->check($p))
                return true;
        }
        return false;
    }
}

