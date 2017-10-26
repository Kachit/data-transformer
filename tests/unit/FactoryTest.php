<?php
use Kachit\DataTransformer\Factory;
use Kachit\DataTransformer\Stub\StubObjectTransformer;
use League\Fractal\Manager;
use Spatie\Fractalistic\Fractal;
use Kachit\DataTransformer\Stub\Entity as StubEntity;
use Spatie\Fractalistic\ArraySerializer;

class FactoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Factory
     */
    protected $factory;

    /**
     *
     */
    protected function _before()
    {
        $fractal = new Manager();
        $fractal->setSerializer(new ArraySerializer());
        $this->factory = new Factory($fractal);
    }

    /**
     *
     */
    public function testItemTransformer()
    {
        $result = $this->factory->item(new StubEntity(), StubObjectTransformer::class);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf(Fractal::class, $result);
        $this->assertEquals(['id' => 10, 'name' => 'foo', 'price' => 10.10], $result->toArray());
    }

    /**
     *
     */
    public function testCollectionTransformer()
    {
        $result = $this->factory->collection([new StubEntity()], StubObjectTransformer::class);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf(Fractal::class, $result);
        $this->assertEquals([['id' => 10, 'name' => 'foo', 'price' => 10.10]], $result->toArray());
    }
}