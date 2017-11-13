<?php
use Kachit\DataTransformer\Replacer\Factory;
use Kachit\DataTransformer\Replacer\Text;
use Kachit\DataTransformer\Replacer\Path;
use Kachit\DataTransformer\ReplacerInterface;

class ReplacersFactoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Factory
     */
    protected $testable;

    /**
     *
     */
    protected function _before()
    {
        $this->testable = (new Factory())->add(new Text())->add(new Path('foo'));
    }

    /**
     *
     */
    public function testGetTextReplacer()
    {
        $result = $this->testable->get('text');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf(ReplacerInterface::class, $result);
        $this->assertInstanceOf(Text::class, $result);
        $this->assertEquals('text', $result->getName());
    }

    /**
     *
     */
    public function testGetPathReplacer()
    {
        $result = $this->testable->get('path');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf(ReplacerInterface::class, $result);
        $this->assertInstanceOf(Path::class, $result);
        $this->assertEquals('path', $result->getName());
    }

    /**
     *
     */
    public function testGetWrong()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Replacer is not available');
        $this->testable->get('foo');
    }
}