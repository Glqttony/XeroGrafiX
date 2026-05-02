<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class ShoppingList
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    public string $name = '';

    #[ORM\OneToMany(targetEntity: ShoppingItem::class, mappedBy: 'list', cascade: ['all'])]
    public iterable $items;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getItems(): iterable
    {
        return $this->items;
    }

    public function setItems(iterable $items): void
    {
        $this->items = $items;
    }
}
