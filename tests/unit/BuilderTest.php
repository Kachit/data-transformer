<?php
use Kachit\DataTransformer\Builder;
use Kachit\DataTransformer\Stub\StubArrayTransformer;
use Kachit\DataTransformer\Stub\StubObjectTransformer;

class BuilderTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     *
     */
    protected function _before()
    {
        $this->builder = new Builder();
    }

    /**
     *
     */
    public function testBuildStubArrayTransformer()
    {
        $result = $this->builder->buildTransformer(StubArrayTransformer::class);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf(StubArrayTransformer::class, $result);
        $this->assertEquals($result, $this->builder->buildTransformer(StubArrayTransformer::class));
    }

    /**
     *
     */
    public function testBuildStubObjectTransformer()
    {
        $result = $this->builder->buildTransformer(StubObjectTransformer::class);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf(StubObjectTransformer::class, $result);
        $this->assertEquals($result, $this->builder->buildTransformer(StubObjectTransformer::class));
    }
}