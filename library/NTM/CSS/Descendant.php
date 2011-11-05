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
        while($p=$el->parentNode)
        {
            if($this->selector->check($p))
                return true;
        }
        return false;
    }
}

