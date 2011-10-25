<?php

namespace NTM;

require_once 'autoload.php';

use NTM\CSS\SimpleSelector,
    NTM\CSS\AdjacentSibling,
    NTM\CSS\Descendant,
    NTM\CSS\GeneralSibling,
    NTM\CSS\Child;

class LexerAndParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider lexerGrammarProvider
     * @param string $code
     * @param array $result 
     */
    public function testLexer($code,$result)
    {
        $tempfile = fopen('php://temp/','rw');
        fwrite($tempfile, $code);
        fseek($tempfile, 0);
        $lexer = new CSS3Lexer($tempfile);
        $lexems = array();
        
        while($t = $lexer->nextToken())
        {
            $lexems[] = array('type'=>$t->type,'value'=>$t->value);
        }
        
        $this->assertEquals($result, $lexems);
    }
    
    public function lexerGrammarProvider()
    {
        return array(
            array(
                'div >  p:first-child',
                array(
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'div'),
                    array('type'=>  CSS3Parser::TK_GREATER,'value'=>'>'),
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'p'),
                    array('type'=>  CSS3Parser::TK_COLON,'value'=>':'),
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'first-child')
                )
            ),
            array(
                ':column(col.selected)',
                array(
                    array('type'=>  CSS3Parser::TK_COLON,'value'=>':'),
                    array('type'=>  CSS3Parser::TK_FUNCTION,'value'=>'column'),
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'col'),
                    array('type'=>  CSS3Parser::TK_CLASS,'value'=>'selected'),
                    array('type'=>  CSS3Parser::TK_FUNCTION_CLOSE,'value'=>')'),
                )
            ),
            array(
                'div.c1.c2[name~="ololo"]',
                array(
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'div'),
                    array('type'=>  CSS3Parser::TK_CLASS,'value'=>'c1'),
                    array('type'=>  CSS3Parser::TK_CLASS,'value'=>'c2'),
                    array('type'=>  CSS3Parser::TK_ATTR_OPEN,'value'=>'['),
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'name'),
                    array('type'=>  CSS3Parser::TK_INCLUDES,'value'=>'~='),
                    array('type'=>  CSS3Parser::TK_STRING,'value'=>'ololo'),
                    array('type'=>  CSS3Parser::TK_ATTR_CLOSE,'value'=>']'),
                )
            ),
            array(
                'div.c1.c2[ name ~= "ololo" not ]',
                array(
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'div'),
                    array('type'=>  CSS3Parser::TK_CLASS,'value'=>'c1'),
                    array('type'=>  CSS3Parser::TK_CLASS,'value'=>'c2'),
                    array('type'=>  CSS3Parser::TK_ATTR_OPEN,'value'=>'['),
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'name'),
                    array('type'=>  CSS3Parser::TK_INCLUDES,'value'=>'~='),
                    array('type'=>  CSS3Parser::TK_STRING,'value'=>'ololo'),
                    array('type'=>  CSS3Parser::TK_S,'value'=>' '),
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'not'),
                    array('type'=>  CSS3Parser::TK_ATTR_CLOSE,'value'=>']'),
                )
            ),
            array(
                'div > .c1 + .c2 ~ #c3 #c4, ul',
                array(
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'div'),
                    array('type'=>  CSS3Parser::TK_GREATER,'value'=>'>'),
                    array('type'=>  CSS3Parser::TK_CLASS,'value'=>'c1'),
                    array('type'=>  CSS3Parser::TK_PLUS,'value'=>'+'),
                    array('type'=>  CSS3Parser::TK_CLASS,'value'=>'c2'),
                    array('type'=>  CSS3Parser::TK_TILDE,'value'=>'~'),
                    array('type'=>  CSS3Parser::TK_HASH,'value'=>'c3'),
                    array('type'=>  CSS3Parser::TK_S,'value'=>' '),
                    array('type'=>  CSS3Parser::TK_HASH,'value'=>'c4'),
                    array('type'=>  CSS3Parser::TK_COMMA,'value'=>','),
                    array('type'=>  CSS3Parser::TK_IDENT,'value'=>'ul')
                )
            )
        );
    }
    
    /**
     * @dataProvider parserTestProvider
     * @param string $code
     * @param array $result 
     */
    public function testParser($code,$result)
    {
        
        $tempfile = fopen('php://temp/','rw');
        fwrite($tempfile, $code);
        fseek($tempfile, 0);
        
        $lexer = new CSS3Lexer($tempfile);
        $parser = new CSS3Parser();
        
        //$parser->trace(STDOUT, '#');
        
        $this->actual = array();

        while($token = $lexer->nextToken())
        {
            $parser->doParse($token->type, $token);
        }
        $parser->doParse(0);
        
        fclose($tempfile);
        
        $this->assertEquals($result, $parser->selectors);
    }
    
    public function parserTestProvider()
    {
        return array(
            array(
                'div >  p:first-child',
                array(
                    SimpleSelector::instance()->setElement('div')
                        ->setCombinator(new Child(
                            CSS\SimpleSelector::instance()->setElement('p')
                                ->addPseudoClass(new CSS\PseudoClass('first-child'))
                        ))
                )
            ),
            array(
                ':column(col.select)',
                array(
                    SimpleSelector::instance()->addPseudoClass(new CSS\PseudoClass(
                        'column',
                        'col.select'
                    ))
                )
            ),
            array(
                'div.c1.c2[name~="ololo"]',
                array(
                    SimpleSelector::instance()->addClass('c1')->addClass('c2')->setElement('div')->addAttribute(new CSS\AttributeTest('name', '~=', 'ololo'))
                )
            ),
            array(
                'div.c1.c2[ name ^= "ololo" not ]',
                array(
                    SimpleSelector::instance()->addClass('c1')->addClass('c2')->setElement('div')->addAttribute(new CSS\AttributeTest('name', '^=', 'ololo' , 'not'))
                )
            ),
            array(
                'div > .c1 + .c2 ~ #c3 #c4, ul',
                array(
                    SimpleSelector::instance()->setElement('div')->setCombinator(
                        new Child(SimpleSelector::instance()->addClass('c1')->setCombinator(
                            new AdjacentSibling(SimpleSelector::instance()->addClass('c2')->setCombinator(
                                new GeneralSibling(SimpleSelector::instance()->setHash('c3')->setCombinator(
                                     new Descendant(SimpleSelector::instance()->setHash('c4'))
                                ))
                            ))
                        ))
                    ),
                    SimpleSelector::instance()->setElement('ul')
                        
                )
            ),
            array(
                'div p li',
                array(
                    SimpleSelector::instance()->setElement('div')->setCombinator(
                        new Descendant(SimpleSelector::instance()->setElement('p')->setCombinator(
                            new Descendant(SimpleSelector::instance()->setElement('li'))
                        ))
                    )
                )
            )
                
        );
    }
}
