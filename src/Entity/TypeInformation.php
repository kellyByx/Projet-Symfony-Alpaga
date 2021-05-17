<?php

namespace App\Entity;

use App\Repository\TypeInformationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeInformationRepository::class)
 */
class TypeInformation
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
    private $Nom;

    /**
     * @ORM\OneToMany(targetEntity=ArticleInfos::class, mappedBy="typeInformation")
     */
    private $typeInfos;

    public function __construct()
    {
        $this->typeInfos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection|ArticleInfos[]
     */
    public function getTypeInfos(): Collection
    {
        return $this->typeInfos;
    }

    public function addTypeInfo(ArticleInfos $typeInfo): self
    {
        if (!$this->typeInfos->contains($typeInfo)) {
            $this->typeInfos[] = $typeInfo;
            $typeInfo->setTypeInformation($this);
        }

        return $this;
    }

    public function removeTypeInfo(ArticleInfos $typeInfo): self
    {
        if ($this->typeInfos->removeElement($typeInfo)) {
            // set the owning side to null (unless already changed)
            if ($typeInfo->getTypeInformation() === $this) {
                $typeInfo->setTypeInformation(null);
            }
        }

        return $this;
    }
}
