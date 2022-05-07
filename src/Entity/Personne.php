<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeDeces;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $biographie;

    /**
     * @ORM\OneToMany(targetEntity=SourcePersonne::class, mappedBy="personne")
     */
    private $sourcePersonnes;

    public function __construct()
    {
        $this->sources = new ArrayCollection();
        $this->sourcePersonnes = new ArrayCollection();
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->prenom, $this->nom);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(?\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getDateDeDeces(): ?\DateTimeInterface
    {
        return $this->dateDeDeces;
    }

    public function setDateDeDeces(?\DateTimeInterface $dateDeDeces): self
    {
        $this->dateDeDeces = $dateDeDeces;

        return $this;
    }

    public function getBiographie(): ?string
    {
        return $this->biographie;
    }

    public function setBiographie(?string $biographie): self
    {
        $this->biographie = $biographie;

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
            $sourcePersonne->setPersonne($this);
        }

        return $this;
    }

    public function removeSourcePersonne(SourcePersonne $sourcePersonne): self
    {
        if ($this->sourcePersonnes->removeElement($sourcePersonne)) {
            // set the owning side to null (unless already changed)
            if ($sourcePersonne->getPersonne() === $this) {
                $sourcePersonne->setPersonne(null);
            }
        }

        return $this;
    }
}
