<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MembreRepository::class)
 */
class Membre
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
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity=ArticleInfos::class, mappedBy="membre")
     */
    private $articlesInfos;

    /**
     * @ORM\OneToMany(targetEntity=AnnonceVisites::class, mappedBy="membre")
     */
    private $annoncesVisites;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    //ajout du hydrate + constructeur ! 
    public function hydrate(array $init)
    {
        foreach ($init as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    
    // on modifie le constructeur pour faire appel au hydrate
  
    public function __construct($arrayInit = [])
    {
        
        $this->articlesInfos = new ArrayCollection();
        $this->annoncesVisites = new ArrayCollection();
        $this->hydrate ($arrayInit);
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|ArticleInfos[]
     */
    public function getArticlesInfos(): Collection
    {
        return $this->articlesInfos;
    }

    public function addArticlesInfo(ArticleInfos $articlesInfo): self
    {
        if (!$this->articlesInfos->contains($articlesInfo)) {
            $this->articlesInfos[] = $articlesInfo;
            $articlesInfo->setMembre($this);
        }

        return $this;
    }

    public function removeArticlesInfo(ArticleInfos $articlesInfo): self
    {
        if ($this->articlesInfos->removeElement($articlesInfo)) {
            // set the owning side to null (unless already changed)
            if ($articlesInfo->getMembre() === $this) {
                $articlesInfo->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AnnonceVisites[]
     */
    public function getAnnoncesVisites(): Collection
    {
        return $this->annoncesVisites;
    }

    public function addAnnoncesVisite(AnnonceVisites $annoncesVisite): self
    {
        if (!$this->annoncesVisites->contains($annoncesVisite)) {
            $this->annoncesVisites[] = $annoncesVisite;
            $annoncesVisite->setMembre($this);
        }

        return $this;
    }

    public function removeAnnoncesVisite(AnnonceVisites $annoncesVisite): self
    {
        if ($this->annoncesVisites->removeElement($annoncesVisite)) {
            // set the owning side to null (unless already changed)
            if ($annoncesVisite->getMembre() === $this) {
                $annoncesVisite->setMembre(null);
            }
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
