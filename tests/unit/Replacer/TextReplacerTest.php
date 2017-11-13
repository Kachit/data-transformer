<?php
use Kachit\DataTransformer\Replacer\Text;

class TextReplacerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Text
     */
    protected $testable;

    /**
     *
     */
    protected function _before()
    {
        $this->testable = new Text(['$foo' => 1, '$bar' => 2]);
    }

    /**
     *
     */
    public function testReplace()
    {
        $result = $this->testable->replace('$foo + $bar');
        $this->assertEquals($result, '1 + 2');
    }
}