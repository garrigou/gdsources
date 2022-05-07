<?php

namespace App\Entity;

use App\Repository\TypeRelationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRelationRepository::class)
 */
class TypeRelation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=SourcePersonne::class, mappedBy="typeRelation")
     */
    private $sourcePersonnes;

    public function __construct()
    {
        $this->sourcePersonnes = new ArrayCollection();
    }

    public function __toString()
    {
        return  $this->nom;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, SourcePersonne>
     */
    public function getSourcePersonnes(): Collection
    {
        return $this->sourcePersonnes;
    }

    public function addSourcePersonne(SourcePersonne $sourcePersonne): self
    {
        if (!$this->sourcePersonnes->contains($sourcePersonne)) {
            $this->sourcePersonnes[] = $sourcePersonne;
            $sourcePersonne->setTypeRelation($this);
        }

        return $this;
    }

    public function removeSourcePersonne(SourcePersonne $sourcePersonne): self
    {
        if ($this->sourcePersonnes->removeElement($sourcePersonne)) {
            // set the owning side to null (unless already changed)
            if ($sourcePersonne->getTypeRelation() === $this) {
                $sourcePersonne->setTypeRelation(null);
            }
        }

        return $this;
    }
}
