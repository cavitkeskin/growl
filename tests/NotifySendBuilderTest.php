<?php
namespace BryanCrowe\Growl\Test;

use BryanCrowe\Growl\Builder\NotifySendBuilder;

class NotifySendBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->NotifySendBuilder = new NotifySendBuilder;
    }

    public function tearDown()
    {
        unset($this->NotifySendBuilder);
        parent::tearDown();
    }

    public function testBuild()
    {
        $options = [
            'title' => 'Hello',
            'message' => 'World',
            'sticky' => true
        ];
        $expected = 'notify-send Hello World -t 0';
        $result = $this->NotifySendBuilder->build($options);
        $this->assertSame($expected, $result);

        $options = [
            'title' => 'Hello',
            'message' => 'Welcome'
        ];
        $expected = 'notify-send Hello Welcome';
        $result = $this->NotifySendBuilder->build($options);
        $this->assertSame($expected, $result);
    }
}
