<?php
use Kachit\DataTransformer\Replacer\Path;

class PathReplacerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Path
     */
    protected $testable;

    /**
     *
     */
    protected function _before()
    {
        $this->testable = new Path('http://cdn.myhost.loc/');
    }

    /**
     *
     */
    public function testReplace()
    {
        $result = $this->testable->replace('foo/bar.jpg');
        $this->assertEquals($result, 'http://cdn.myhost.loc/foo/bar.jpg');
    }

    /**
     *
     */
    public function testReplaceSlash()
    {
        $result = $this->testable->replace('/foo/bar.jpg');
        $this->assertEquals($result, 'http://cdn.myhost.loc/foo/bar.jpg');
    }
}