<?php

namespace App\Entity;

use App\Repository\HeroeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroeRepository::class)
 */
class Heroe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $biography;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $father;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mother;

    /**
     * @ORM\ManyToOne(targetEntity=Title::class, inversedBy="heroes")
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity=House::class, inversedBy="heroes")
     */
    private $house;

    public function __construct()
    {
        $this->house = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getFather(): ?int
    {
        return $this->father;
    }

    public function setFather(?int $father): self
    {
        $this->father = $father;

        return $this;
    }

    public function getMother(): ?int
    {
        return $this->mother;
    }

    public function setMother(?int $mother): self
    {
        $this->mother = $mother;

        return $this;
    }

    public function getTitle(): ?Title
    {
        return $this->title;
    }

    public function setTitle(?Title $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, House>
     */
    public function getHouse(): Collection
    {
        return $this->house;
    }

    public function addHouse(House $house): self
    {
        if (!$this->house->contains($house)) {
            $this->house[] = $house;
        }

        return $this;
    }

    public function removeHouse(House $house): self
    {
        $this->house->removeElement($house);

        return $this;
    }
}
