<?php
/**
 * Class BuilderInterface
 *
 * @package Kachit\DataTransformer
 * @author Kachit
 */
namespace Kachit\DataTransformer;

interface BuilderInterface
{
    /**
     * @param string $className
     * @return TransformerAbstract
     */
    public function buildTransformer(string $className): TransformerAbstract;
}