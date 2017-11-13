<?php
/**
 * Class Path
 *
 * @package Kachit\DataTransformer\Replacer
 * @author Kachit
 */
namespace Kachit\DataTransformer\Replacer;

use Kachit\DataTransformer\ReplacerInterface;

class Path implements ReplacerInterface
{
    /**
     * @var array
     */
    private $path = [];

    /**
     * Replacer constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param string $path
     * @return string
     */
    public function replace(string $path): string
    {
        return rtrim($this->path, '/') . '/' . ltrim($path, '/');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'path';
    }
}