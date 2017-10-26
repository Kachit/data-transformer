<?php
use Kachit\DataTransformer\Builder;
use Kachit\DataTransformer\Stub\StubArrayTransformer;
use Kachit\DataTransformer\Stub\StubObjectTransformer;
use Kachit\DataTransformer\Stub\StubCollectionTransformer;
use Kachit\DataTransformer\Stub\Entity as StubEntity;

class TransformerTest extends \Codeception\Test\Unit
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

    // tests
    public function testTransformArray()
    {
        $transformer = $this->builder->buildTransformer(StubArrayTransformer::class);
        $result = $transformer->transform(['id' => '10', 'name' => 'foo', 'password' => 'bar']);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(['id' => 10, 'name' => 'foo'], $result);
    }

    // tests
    public function testTransformObject()
    {
        $transformer = $this->builder->buildTransformer(StubObjectTransformer::class);
        $result = $transformer->transform(new StubEntity());
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(['id' => 10, 'name' => 'foo', 'price' => 10.10], $result);
    }

    // tests
    public function testTransformInCollectionMode()
    {
        $transformer = $this->builder->buildTransformer(StubCollectionTransformer::class);
        $result = $transformer->setCollectionMode(true)->transform(['id' => '10', 'name' => 'foo', 'text' => 'bar']);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(['id' => 10, 'name' => 'foo'], $result);
    }
}