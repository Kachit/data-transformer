<?php
/**
 * Class Text
 *
 * @package Kachit\DataTransformer\Replacer
 * @author Kachit
 */
namespace Kachit\DataTransformer\Replacer;

use Kachit\DataTransformer\ReplacerInterface;

class Text implements ReplacerInterface
{
    /**
     * @var array
     */
    private $variables = [];

    /**
     * Replacer constructor.
     *
     * @param array $variables
     */
    public function __construct(array $variables = [])
    {
        $this->variables = $variables;
    }

    /**
     * @param string $text
     * @return string
     */
    public function replace(string $text): string
    {
        return str_replace(array_keys($this->variables), array_values($this->variables), $text);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'text';
    }
}