<?php


/**
 * Description of PHPTemplateTest
 *
 * @author tz-lom
 */
class PHPTemplateTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @dataProvider templateProvider
     * @param string $code
     * @param array $result 
     */
    public function testSeparation($template,$res)
    {
        $t = new \NTM\TemplatePHP();
        $sep = $t->separate($template);
        $this->assertEquals($res,$sep);
    }
    
    public function templateProvider()
    {
        return array(
            array(
                'html <?php echo $false;?> html',
                array(
                    array(false,'html '),
                    array(true,'<?php echo $false;?>'),
                    array(false,' html')
                )
            ),
            array(
                '<?php test',
                array(
                    array(false,''),
                    array(true,'<?php test')
                )
            ),
            array(
                'ht<?=php;?>',
                array(
                    array(false,'ht'),
                    array(true,'<?=php;?>')
                )
            ),
            array(
                'h<? short php tag; ?>"text"',
                array(
                    array(false,'h'),
                    array(true,'<? short php tag; ?>'),
                    array(false,'"text"')
                )
            ),
            array(
                'h<?php "text?>"; \'?>\' "text\"?>" \'text\\\'?>\' ?>',
                array(
                    array(false,'h'),
                    array(true,'<?php "text?>"; \'?>\' "text\"?>" \'text\\\'?>\' ?>')
                )
            ),
            array(
                <<<HERE
h<?php <<<HEREDOC
<?php
"pew pew?>
'?>
NOT
HEREDOC;
?>html<<<HERE
HERE
                ,
                array(
                    array(false,'h'),
                    array(true,"<?php <<<HEREDOC\n<?php\n\"pew pew?>\n'?>\nNOT\nHEREDOC;\n?>"),
                    array(false,'html<<<HERE')
                )
            )
        );
    }
}
