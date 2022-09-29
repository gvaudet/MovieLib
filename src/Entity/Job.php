<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $label = null;

    #[ORM\OneToMany(mappedBy: 'job', targetEntity: PeopleJobs::class)]
    private Collection $peopleJobs;

    public function __construct()
    {
        $this->peopleJobs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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
            $peopleJob->setJob($this);
        }

        return $this;
    }

    public function removePeopleJob(PeopleJobs $peopleJob): self
    {
        if ($this->peopleJobs->removeElement($peopleJob)) {
            // set the owning side to null (unless already changed)
            if ($peopleJob->getJob() === $this) {
                $peopleJob->setJob(null);
            }
        }

        return $this;
    }
}
