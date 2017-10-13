<?php
/**
 * Class TransformerAbstract
 *
 * @package Kachit\DataTransformer
 * @author Kachit
 */
namespace Kachit\DataTransformer;

use League\Fractal\TransformerAbstract as FractalTransformerAbstract;

abstract class TransformerAbstract extends FractalTransformerAbstract
{
    /**
     * @var bool
     */
    protected $collectionMode = false;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var ReplacerInterface
     */
    protected $replacer;

    /**
     * TransformerAbstract constructor
     *
     * @param BuilderInterface $builder
     * @param ReplacerInterface $replacer
     */
    public function __construct(BuilderInterface $builder, ReplacerInterface $replacer)
    {
        $this->builder = $builder;
        $this->replacer = $replacer;
    }

    /**
     * @param array|object $entity
     * @return array
     */
    abstract public function transform($entity): array;

    /**
     * @return bool
     */
    public function isCollectionMode(): bool
    {
        return $this->collectionMode;
    }

    /**
     * @param bool $collectionMode
     * @return TransformerAbstract
     */
    public function setCollectionMode(bool $collectionMode): TransformerAbstract
    {
        $this->collectionMode = $collectionMode;
        return $this;
    }

    /**
     * @param array $array
     * @return array
     */
    protected function transformArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if (is_object($value)) {
                $array[$key] = $this->transformObject($value);
            } elseif (is_scalar($value)) {
                $array[$key] = $this->transformScalar($value);
            } elseif (is_array($value)) {
                $array[$key] = $this->transformArray($value);
            } else {
                $array[$key] = $value;
            }
        }
        return $array;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    protected function transformScalar($value)
    {
        if (is_numeric($value)) {
            if ($value === (int)$value) {
                $value = (int) $value;
            } else {
                $value = (float) $value;
            }
        }
        if (in_array(strtolower($value), ['true', 'false'])) {
            $value = (bool) $value;
        }
        if (strtolower($value) === 'null') {
            $value = null;
        }
        return $value;
    }

    /**
     * @param object $value
     * @return mixed
     */
    protected function transformObject($value)
    {
        if (method_exists($value, 'toArray')) {
            $value = $this->transformArray($value->toArray());
        }
        return $value;
    }
}