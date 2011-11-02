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
            )
        );
    }
}
