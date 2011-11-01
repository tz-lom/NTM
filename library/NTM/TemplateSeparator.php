<?php

namespace NTM;

/**
 * Description of TemplateSeparator
 *
 * @author tz-lom
 */
interface TemplateSeparator
{
    /**
     * @param string $template  input template
     * @return array[]
     */
    public function separate($template);
}
