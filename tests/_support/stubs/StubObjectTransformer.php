<?php
/**
 * Class StubObjectTransformer
 *
 * @author Kachit
 */
namespace Kachit\DataTransformer\Stub;

use Kachit\DataTransformer\TransformerAbstract;

class StubObjectTransformer extends TransformerAbstract
{
    /**
     * @param array|object|Entity $entity
     * @return array
     */
    public function transform($entity): array
    {
        return [
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'price' => $entity->getPrice(),
        ];
    }
}