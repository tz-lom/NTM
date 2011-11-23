<?php

namespace NTM\CSS;

/**
 * div + p
 *
 * @author tz-lom
 */
class AdjacentSibling extends Combinator
{
    public function check(\DOMElement $el)
    {
        return $el->previouseSibling instanceof \DOMElement && $this->selector->check($el->previouseSibling);
    }
}

