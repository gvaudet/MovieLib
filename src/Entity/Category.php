<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: FilmCategory::class)]
    private Collection $filmCategories;

    public function __construct()
    {
        $this->films = new ArrayCollection();
        $this->filmCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, FilmCategory>
     */
    public function getFilmCategories(): Collection
    {
        return $this->filmCategories;
    }

    public function addFilmCategory(FilmCategory $filmCategory): self
    {
        if (!$this->filmCategories->contains($filmCategory)) {
            $this->filmCategories->add($filmCategory);
            $filmCategory->setCategory($this);
        }

        return $this;
    }

    public function removeFilmCategory(FilmCategory $filmCategory): self
    {
        if ($this->filmCategories->removeElement($filmCategory)) {
            // set the owning side to null (unless already changed)
            if ($filmCategory->getCategory() === $this) {
                $filmCategory->setCategory(null);
            }
        }

        return $this;
    }
}
