<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
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
     * @ORM\OneToMany(targetEntity=AnnonceVisites::class, mappedBy="ville")
     */
    private $localisationVisit;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="villes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;

    public function __construct()
    {
        $this->localisationVisit = new ArrayCollection();
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
     * @return Collection|AnnonceVisites[]
     */
    public function getLocalisationVisit(): Collection
    {
        return $this->localisationVisit;
    }

    public function addLocalisationVisit(AnnonceVisites $localisationVisit): self
    {
        if (!$this->localisationVisit->contains($localisationVisit)) {
            $this->localisationVisit[] = $localisationVisit;
            $localisationVisit->setVille($this);
        }

        return $this;
    }

    public function removeLocalisationVisit(AnnonceVisites $localisationVisit): self
    {
        if ($this->localisationVisit->removeElement($localisationVisit)) {
            // set the owning side to null (unless already changed)
            if ($localisationVisit->getVille() === $this) {
                $localisationVisit->setVille(null);
            }
        }

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
