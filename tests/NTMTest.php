<?php

require_once 'autoload.php';

/**
 * Test class for NTM.
 * Generated by PHPUnit on 2011-10-30 at 15:42:48.
 */
class NTMTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider htmlDataProvider
     */
    public function testLoadAndSave($html)
    {
        $ntm = new NTM($html);
        $this->assertEquals($html,trim($ntm->getHTML()));
    }
    
    public function htmlDataProvider()
    {
        return array(
            array("<!DOCTYPE HTML>\n<html><head><title></title></head><body></body></html>"),
            array("<!DOCTYPE HTML>\n<html><head><title><?php \$tags=123; ?></title></head><body></body></html>"),
            array('<?php echo "no html";?>'),
            array('<html <?php echo $a;?>><?php $a=3; ?></html>')
        );
    }

}
