<?php
/**
 * Class StubObjectTransformer
 *
 * @author Kachit
 */
namespace Kachit\DataTransformer\Stub;

use Kachit\DataTransformer\TransformerAbstract;

class StubCollectionTransformer extends TransformerAbstract
{
    /**
     * @param array|object $entity
     * @return array
     */
    public function transform($entity): array
    {
        $entity = $this->transformArray($entity);
        if ($this->isCollectionMode()) {
            unset($entity['text']);
        }
        return $entity;
    }
}