<?php
use Kachit\DataTransformer\Builder;

class BuilderTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var
     */
    protected $builder;

    protected function _before()
    {
        $this->builder = new Builder();
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }
}