<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
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
     * @ORM\OneToMany(targetEntity=ArticleInfos::class, mappedBy="theme")
     */
    private $themeInfo;

    public function __construct()
    {
        $this->themeInfo = new ArrayCollection();
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
    public function getThemeInfo(): Collection
    {
        return $this->themeInfo;
    }

    public function addThemeInfo(ArticleInfos $themeInfo): self
    {
        if (!$this->themeInfo->contains($themeInfo)) {
            $this->themeInfo[] = $themeInfo;
            $themeInfo->setTheme($this);
        }

        return $this;
    }

    public function removeThemeInfo(ArticleInfos $themeInfo): self
    {
        if ($this->themeInfo->removeElement($themeInfo)) {
            // set the owning side to null (unless already changed)
            if ($themeInfo->getTheme() === $this) {
                $themeInfo->setTheme(null);
            }
        }

        return $this;
    }
}
