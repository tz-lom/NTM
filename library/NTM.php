<?php
/**
 * Description of NTM
 *
 * @author tz-lom
 */
class NTM
{
    protected $trigger = 'specialnativetemplatemanipulatortrigger';
    /**
     * @var DOMDocument
     */
    protected $dom = NULL;
    protected $root = NULL;
    protected $xpath = NULL;
    protected $partial = false;
    protected $nodoctype = false;
    
    public function __construct($template,$trigger = NULL)
    {
        $this->trigger = $trigger?$trigger:$this->trigger;
        
        $html = $this->hideMarkdown($template);
        
        $this->partial = stripos($html, '<html') === false;
        $this->nodoctype = stripos($html, '<!doctype') === false;

        $this->dom = new DOMDocument;
        $this->dom->formatOutput = false;
        $this->dom->strictErrorChecking = false;
        
        
        if($this->partial)
        {
            $html = "<!DOCTYPE HTML><html><head></head><body>$html</body></html>";
        }
        elseif($this->nodoctype)
        {
            $html = '<!DOCTYPE HTML>'.$html;
        }

        @$this->dom->loadHTML($html);
        
        if($this->partial)
        {
            $this->root = $this->dom->firstChild->nextSibling->firstChild->nextSibling;
        }
        else
        {
            $this->root = $this->dom->firstChild->nextSibling->firstChild;
        }
        
        $this->xpath = new DOMXPath($this->dom);
    }
    
    public function encodeMarkdown($hide)
    {
        return $this->trigger.md5($hide).bin2hex($hide).'z';
    }
    
    public function decodeMarkdown($data)
    {
        if(substr($data,-1)!='z') return false;
        
        $Tlen = strlen($this->trigger);
        $Hlen = strlen(md5(''));
        
        if(substr($data,0,$Tlen)!=$this->trigger) return false;
        
        $hash = substr($data,$Tlen,$Hlen);      //get hash
        $data = substr($data,$Tlen+$Hlen,-1);   //get data

        $data = pack('h*',$data); //decode
        
        if(md5($data)==$hash)
            return $data;
        else
            return false;
    }
    
    protected function hideMarkdown($template)
    {
        $tokens = token_get_all($template);
        
        $html = '';
        $this->trigger.=md5($template);
        
        $hide = '';
        
        foreach($tokens as $token)
        {
            if(is_array($token))
            {
                if($token[0]==311)
                {
                    if($hide)
                    {
                        $html.=$this->encodeMarkdown($hide);
                        $hide='';
                    }
                    $html.=$token[1];
                }
                else
                {
                    $hide.=$token[1];
                }
            }
            else
            {
                $hide.=$token;
            }
        }
        if($hide)
        {
            $html.=$this->encodeMarkdown($hide);
        }
        return $html;
    }
    
    protected function showMarkdown($html)
    {
        $Tlen = strlen($this->trigger);
        $Hlen = strlen(md5(''));
        
        $pos = 0;
        while($pos<strlen($html) && ($pos = strpos($html, $this->trigger,$pos))!==false)
        {
            $end = strpos($html, 'z',$pos+$Tlen)+1;
            if($end===false) continue;
            $data = substr($html,$pos,$end-$pos);
            //try to decode data
            
            $data = $this->decodeMarkdown($data);
            if($data)
            {
                // it is correct block
                $html = substr($html,0,$pos).$data.substr($html,$end); // replace tags
                $pos = $end+(strlen($data)-($end-$pos));
            }
            else
            {
                $pos++;
            }
        }
        return $html;
    }
    
    public function getDOM()
    {
        return $this->dom;
    }
    
    public function getRoot()
    {
        return $this->root;
    }
    
    public function getXPath()
    {
        return $this->xpath;
    }
    
    public function getHTML()
    {
        $html = $this->dom->saveHTML();
        
        if($this->partial)
        {
            $beg = strpos($html, '<body>')+6;
            $end = strrpos($html, '</body>');
            $html = substr($html, $beg,$end-$beg);
        }
        elseif($this->nodoctype)
        {
            $html = substr($html, strpos($html,'<html'));
        }
        
        return $this->showMarkdown($html);
    }
    
    public function getElementsByCSS($css)
    {
        return $this->selectElements($this->CSStoAST($css));
    }
    
    /**
     *
     * @param string $css
     * @return NTM\CSS\SimpleSelector
     */
    public function CSStoAST($css)
    {
        $tempfile = fopen('php://temp/','rw');
        fwrite($tempfile, $code);
        fseek($tempfile, 0);
        
        $lexer = new CSS3Lexer($tempfile);
        $parser = new CSS3Parser();
        
        //$parser->trace(STDOUT, '#');

        while($token = $lexer->nextToken())
        {
            $parser->doParse($token->type, $token);
        }
        $parser->doParse(0);
        
        fclose($tempfile);
        return $parser->selectors;
    }
    
    public function selectElements(NTM\CSS\SimpleSelector $selector)
    {
        $elements = $this->xpath->query($selector->XPath());
        
        $result = array();
        
        foreach($elements as $element)
        {
            if($selector->check($element))
            {
                $result[] = $element;
            }
        }
        return $result;
    }
}
