<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class ShoppingItem
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name = '';

    #[ORM\Column]
    #[Assert\NotBlank]
    public int $amout = 0;

    #[ORM\ManyToOne(targetEntity: ShoppingList::class, inversedBy: 'items')]
    #[ORM\JoinColumn(name: "shopping_list_id", referencedColumnName: "id", nullable: false)]
    public ?ShoppingList $list = null;

    /**
     * @param string $name
     * @param int $amout
     * @param ShoppingList|null $list
     */
    public function __construct(string $name, int $amout, ?ShoppingList $list)
    {
        $this->name = $name;
        $this->amout = $amout;
        $this->list = $list;
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

    public function getAmout(): int
    {
        return $this->amout;
    }

    public function setAmout(int $amout): void
    {
        $this->amout = $amout;
    }

    public function getList(): ?ShoppingList
    {
        return $this->list;
    }

    public function setList(?ShoppingList $list): void
    {
        $this->list = $list;
    }


}
