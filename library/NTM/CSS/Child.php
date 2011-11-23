<?php


namespace NTM\CSS;

/**
 * div > p
 *
 * @author tz-lom
 */
class Child extends Combinator
{
    public function check(\DOMElement $el)
    {
        return $el->parentNode instanceof \DOMElement && $this->selector->check($el->parentNode);
    }
}

