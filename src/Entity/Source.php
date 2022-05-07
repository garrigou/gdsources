<?php

namespace App\Entity;

use App\Repository\SourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SourceRepository::class)
 */
class Source
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
     * @ORM\ManyToOne(targetEntity=TypeDocument::class, inversedBy="sources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeDocument;

    /**
     * @ORM\OneToMany(targetEntity=SourcePersonne::class, mappedBy="source")
     */
    private $sourcePersonnes;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    public function __construct()
    {
        $this->sourcePersonnes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
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

    public function getTypeDocument(): ?TypeDocument
    {
        return $this->typeDocument;
    }

    public function setTypeDocument(?TypeDocument $typeDocument): self
    {
        $this->typeDocument = $typeDocument;

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
            $sourcePersonne->setSource($this);
        }

        return $this;
    }

    public function removeSourcePersonne(SourcePersonne $sourcePersonne): self
    {
        if ($this->sourcePersonnes->removeElement($sourcePersonne)) {
            // set the owning side to null (unless already changed)
            if ($sourcePersonne->getSource() === $this) {
                $sourcePersonne->setSource(null);
            }
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
