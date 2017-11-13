<?php
/**
 * Class StubArrayReplaceTransformer
 *
 * @author Kachit
 */
namespace Kachit\DataTransformer\Stub;

use Kachit\DataTransformer\TransformerAbstract;

class StubArrayReplaceTransformer extends TransformerAbstract
{
    /**
     * @param array|object $entity
     * @return array
     */
    public function transform($entity): array
    {
        $entity = $this->transformArray($entity);
        $entity['path'] = $this->replacers->get('path')->replace($entity['path']);
        return $entity;
    }
}