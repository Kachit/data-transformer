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
    protected $transformers = [];

    /**
     * @var ReplacerInterface
     */
    protected $replacer;

    /**
     * Builder constructor.
     *
     * @param ReplacerInterface $replacer
     */
    public function __construct(ReplacerInterface $replacer = null)
    {
        $this->replacer = $replacer ?? new Replacer();
    }

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
        return new $className($this, $this->replacer);
    }
}