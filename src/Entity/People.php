<?php

namespace App\Entity;

use App\Repository\PeopleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeopleRepository::class)]
class People
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    private ?string $firstname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Biography = null;

    #[ORM\OneToMany(mappedBy: 'people', targetEntity: Attendees::class)]
    private Collection $attendees;

    #[ORM\OneToMany(mappedBy: 'people', targetEntity: PeopleJobs::class)]
    private Collection $peopleJobs;

    public function __construct()
    {
        $this->attendees = new ArrayCollection();
        $this->peopleJobs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->Biography;
    }

    public function setBiography(?string $Biography): self
    {
        $this->Biography = $Biography;

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
            $attendee->setPeople($this);
        }

        return $this;
    }

    public function removeAttendee(Attendees $attendee): self
    {
        if ($this->attendees->removeElement($attendee)) {
            // set the owning side to null (unless already changed)
            if ($attendee->getPeople() === $this) {
                $attendee->setPeople(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PeopleJobs>
     */
    public function getPeopleJobs(): Collection
    {
        return $this->peopleJobs;
    }

    public function addPeopleJob(PeopleJobs $peopleJob): self
    {
        if (!$this->peopleJobs->contains($peopleJob)) {
            $this->peopleJobs->add($peopleJob);
            $peopleJob->setPeople($this);
        }

        return $this;
    }

    public function removePeopleJob(PeopleJobs $peopleJob): self
    {
        if ($this->peopleJobs->removeElement($peopleJob)) {
            // set the owning side to null (unless already changed)
            if ($peopleJob->getPeople() === $this) {
                $peopleJob->setPeople(null);
            }
        }

        return $this;
    }
}
