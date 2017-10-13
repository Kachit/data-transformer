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
     * @return array
     */
    public function getMap(): array;

    /**
     * @param array $map
     * @return ReplacerInterface
     */
    public function setMap(array $map = []): ReplacerInterface;
}