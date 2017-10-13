<?php
/**
 * Class Factory
 *
 * @package Kachit\DataTransformer
 * @author Kachit
 */
namespace Kachit\DataTransformer;

use Spatie\Fractalistic\Fractal;
use League\Fractal\Manager;

class Factory
{
    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var BuilderInterface
     */
    private $builder;

    /**
     * Factory constructor.
     *
     * @param Manager $manager
     * @param BuilderInterface $builder
     */
    public function __construct(Manager $manager, BuilderInterface $builder = null)
    {
        $this->manager = $manager;
        $this->builder = $builder ?? new Builder();
    }

    /**
     * @return Fractal
     */
    public function getFractal(): Fractal
    {
        return new Fractal($this->manager);
    }

    /**
     * @param array|object $entity
     * @param string $transformerClass
     * @return Fractal
     */
    public function item($entity, string $transformerClass): Fractal
    {
        $transformer = $this->builder->buildTransformer($transformerClass);
        return $this->getFractal()->item($entity, $transformer->setCollectionMode(false));
    }

    /**
     * @param array|iterable $collection
     * @param string $transformerClass
     * @return Fractal
     */
    public function collection($collection, string $transformerClass): Fractal
    {
        $transformer = $this->builder->buildTransformer($transformerClass);
        return $this->getFractal()->collection($collection, $transformer->setCollectionMode(true));
    }
}