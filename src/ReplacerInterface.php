<?php
/**
 * Class ReplacerInterface
 *
 * @package Kachit\DataTransformer
 * @author Kachit
 */
namespace Kachit\DataTransformer;

interface ReplacerInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function replace(string $text): string;

    /**
     * @return string
     */
    public function getName(): string;
}