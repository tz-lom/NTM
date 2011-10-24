<?php
/**
 * Description of NTM
 *
 * @author tz-lom
 */
class NTM
{
    protected $trigger = 'specialNativeTemplateManipulatorTrigger';
    
    public function __construct($template)
    {
        
        $tokens = token_get_all($template);
        
        $html = '';
        $this->trigger.=md5($template);
        
        $hide = '';
        
        foreach($tokens as $token)
        {
            if($token[0]==311)
            {
                if($hide)
                {
                    $html.=$this->trigger.md5($hide).base64_encode($hide);
                    $hide='';
                }
                $html.=$token[1];
            }
            else
            {
                $hide.=$token[1];
            }
        }
        if($hide)
        {
            $html.=$this->trigger.md5($hide).base64_encode($hide);
        }
        
        echo $html;
    }
}
