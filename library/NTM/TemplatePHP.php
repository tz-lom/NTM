<?php
namespace NTM;
/**
 * Description of TemplatePHP
 *
 * @author tz-lom
 */
class TemplatePHP implements TemplateSeparator
{
    public function separate($template)
    {
        $result = array();
        
        $tempfile = fopen('php://temp/','rw');
        fwrite($tempfile, $template);
        fseek($tempfile, 0);
        
        $lexer = new PHPLexer($tempfile);
        
        $type = false;
        $pool = '';
        
        while($token = $lexer->nextToken())
        {
            if($token->type!=$type)
            {
                $result[] = array($type,$pool);
                $pool = $token->value;
                $type = $token->type;
            }
            else
            {
                $pool.= $token->value;
            }
        }
        $result[] = array($type,$pool);
        
        fclose($tempfile);
        return $result;
    }
}
