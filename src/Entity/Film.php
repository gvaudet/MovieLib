<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // length = 255 because the longest film title is 169 characters
    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $poster = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'film', targetEntity: Attendees::class)]
    private Collection $attendees;

    #[ORM\OneToMany(mappedBy: 'film', targetEntity: FilmCategory::class)]
    private Collection $filmCategories;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $duration = null;

    public function __construct()
    {
        $this->attendees = new ArrayCollection();
        $this->filmCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Attendees>
     */
    public function getAttendees(): Collection
    {
        return $this->attendees;
    }

    public function addAttendee(Attendees $attendee): self
    {
        if (!$this->attendees->contains($attendee)) {
            $this->attendees->add($attendee);
            $attendee->setFilm($this);
        }

        return $this;
    }

    public function removeAttendee(Attendees $attendee): self
    {
        if ($this->attendees->removeElement($attendee)) {
            // set the owning side to null (unless already changed)
            if ($attendee->getFilm() === $this) {
                $attendee->setFilm(null);
            }
        }

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
            $filmCategory->setFilm($this);
        }

        return $this;
    }

    public function removeFilmCategory(FilmCategory $filmCategory): self
    {
        if ($this->filmCategories->removeElement($filmCategory)) {
            // set the owning side to null (unless already changed)
            if ($filmCategory->getFilm() === $this) {
                $filmCategory->setFilm(null);
            }
        }

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

}
