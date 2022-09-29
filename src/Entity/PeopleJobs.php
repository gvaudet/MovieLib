<?php

namespace App\Entity;

use App\Repository\PeopleJobsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeopleJobsRepository::class)]
class PeopleJobs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'peopleJobs')]
    private ?People $people = null;

    #[ORM\ManyToOne(inversedBy: 'peopleJobs')]
    private ?Job $job = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeople(): ?People
    {
        return $this->people;
    }

    public function setPeople(?People $people): self
    {
        $this->people = $people;

        return $this;
    }

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(?Job $job): self
    {
        $this->job = $job;

        return $this;
    }
}
