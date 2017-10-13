<?php
/**
 * Class Builder
 *
 * @package Kachit\DataTransformer
 * @author Kachit
 */
namespace Kachit\DataTransformer;

class Builder implements BuilderInterface
{
    /**
     * @var array
     */
    private $transformers = [];

    /**
     * @param string $className
     * @return TransformerAbstract
     */
    public function buildTransformer(string $className): TransformerAbstract
    {
        if (!isset($this->transformers[$className])) {
            $this->transformers[$className] = $this->createTransformerClass($className);
        }
        return $this->transformers[$className];
    }

    /**
     * @param string $className
     * @return TransformerAbstract
     */
    protected function createTransformerClass(string $className): TransformerAbstract
    {
        return new $className($this);
    }
}