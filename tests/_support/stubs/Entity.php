<?php
/**
 * Class Entity
 *
 * @package Kachit\DataTransformer\Stub
 * @author Kachit
 */
namespace Kachit\DataTransformer\Stub;

class Entity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * Entity constructor.
     *
     * @param int $id
     * @param string $name
     * @param float $price
     */
    public function __construct(int $id = 10, string $name = 'foo', float $price = 10.10)
    {
        $this
            ->setId($id)
            ->setName($name)
            ->setPrice($price)
        ;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Entity
     */
    public function setId(int $id): Entity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Entity
     */
    public function setName(string $name): Entity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Entity
     */
    public function setPrice(float $price): Entity
    {
        $this->price = $price;
        return $this;
    }
}