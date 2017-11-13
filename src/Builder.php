<?php
/**
 * Class Builder
 *
 * @package Kachit\DataTransformer
 * @author Kachit
 */
namespace Kachit\DataTransformer;

use Kachit\DataTransformer\Replacer\Factory as ReplacersFactory;

class Builder implements BuilderInterface
{
    /**
     * @var array
     */
    protected $transformers = [];

    /**
     * @var ReplacersFactory
     */
    protected $replacers;

    /**
     * Builder constructor.
     *
     * @param ReplacersFactory $replacers
     */
    public function __construct(ReplacersFactory $replacers = null)
    {
        $this->replacers = $replacers ?? new ReplacersFactory();
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
        return new $className($this, $this->replacers);
    }
}