<?php
use BryanCrowe\Growl\Builder\GrowlNotifyBuilder;
use \PHPUnit_Framework_TestCase;

class GrowlNotifyBuilderTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->GrowlNotifyBuilder = new GrowlNotifyBuilder();
    }

    public function tearDown()
    {
        unset($this->GrowlNotifyBuilder);
        parent::tearDown();
    }

    public function testBuild()
    {
        $options = array(
            'title' => 'Hello',
            'message' => 'World',
            'sticky' => true
        );
        $expected = 'growlnotify -t Hello -m World -s';
        $result = $this->GrowlNotifyBuilder->build($options);
        $this->assertSame($expected, $result);

        $options = array(
            'title' => 'Hello',
            'message' => 'World',
            'sticky' => false
        );
        $expected = 'growlnotify -t Hello -m World';
        $result = $this->GrowlNotifyBuilder->build($options);
        $this->assertSame($expected, $result);
    }
}
