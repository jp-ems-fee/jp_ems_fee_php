<?php
namespace JpEmsFee\Test;

use JpEmsFee\JpEmsFee;

class JpEmsFeeTest extends \PHPUnit_Framework_TestCase
{
    public function setUp(){}

    public function tearDown(){}

    public function testAsia ()
    {
        $this->assertEquals(JpEmsFee::asia(100), 1400);
        $this->assertEquals(JpEmsFee::asia(600), 1540);
    }

    public function testOceania ()
    {
        $this->assertEquals(JpEmsFee::oceania(100), 2000);
        $this->assertEquals(JpEmsFee::oceania(30000), 36500);
    }

    public function testEuropa ()
    {
        $this->assertEquals(JpEmsFee::europa(100), 2200);
        $this->assertEquals(JpEmsFee::europa(30000), 42600);
    }

    public function testAfrica ()
    {
        $this->assertEquals(JpEmsFee::africa(100), 2400);
        $this->assertEquals(JpEmsFee::africa(30000), 69700);
    }
}
