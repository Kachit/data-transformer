<?php
/**
 * Class StubArrayTransformer
 *
 * @author Kachit
 */
namespace Kachit\DataTransformer\Stub;

use Kachit\DataTransformer\TransformerAbstract;

class StubArrayTransformer extends TransformerAbstract
{
    /**
     * @param array|object $entity
     * @return array
     */
    public function transform($entity): array
    {
        $entity = $this->transformArray($entity);
        unset($entity['password']);
        return $entity;
    }
}