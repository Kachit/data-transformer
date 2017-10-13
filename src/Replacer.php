<?php
/**
 * Class Replacer
 *
 * @package Kachit\DataTransformer
 * @author Kachit
 */
namespace Kachit\DataTransformer;

class Replacer implements ReplacerInterface
{
    /**
     * @var array
     */
    private $map = [];

    /**
     * Replacer constructor.
     *
     * @param array $map
     */
    public function __construct(array $map = [])
    {
        $this->setMap($map);
    }

    /**
     * @param string $text
     * @return string
     */
    public function replace(string $text): string
    {
        return str_replace(array_keys($this->map), array_values($this->map), $text);
    }

    /**
     * @return array
     */
    public function getMap(): array
    {
        return $this->map;
    }

    /**
     * @param array $map
     * @return ReplacerInterface
     */
    public function setMap(array $map = []): ReplacerInterface
    {
        $this->map = $map;
        return $this;
    }
}