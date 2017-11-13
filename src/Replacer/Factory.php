<?php
/**
 * Class Factory
 *
 * @package Kachit\DataTransformer\Replacer
 * @author Kachit
 */
namespace Kachit\DataTransformer\Replacer;

use Kachit\DataTransformer\ReplacerInterface;

class Factory
{
    /**
     * @var ReplacerInterface[]
     */
    private $replacers = [];

    /**
     * @param string $name
     * @return ReplacerInterface
     */
    public function get(string $name): ReplacerInterface
    {
        if (!isset($this->replacers[$name])) {
            throw new \InvalidArgumentException('Replacer is not available');
        }
        return $this->replacers[$name];
    }

    /**
     * @param ReplacerInterface $replacer
     * @return $this
     */
    public function add(ReplacerInterface $replacer)
    {
        $this->replacers[$replacer->getName()] = $replacer;
        return $this;
    }
}