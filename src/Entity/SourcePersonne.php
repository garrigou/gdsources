<?php

namespace App\Entity;

use App\Repository\SourcePersonneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SourcePersonneRepository::class)
 */
class SourcePersonne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TypeRelation::class, inversedBy="sourcePersonnes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeRelation;

    /**
     * @ORM\ManyToOne(targetEntity=Source::class, inversedBy="sourcePersonnes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $source;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="sourcePersonnes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeRelation(): ?TypeRelation
    {
        return $this->typeRelation;
    }

    public function setTypeRelation(?TypeRelation $typeRelation): self
    {
        $this->typeRelation = $typeRelation;

        return $this;
    }

    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }
}
