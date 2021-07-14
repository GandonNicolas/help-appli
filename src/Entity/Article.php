<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    
    private $createDate;

    /**
     * @ORM\ManyToMany(targetEntity=Keyword::class, inversedBy="articles")
     */
    private $keywords;

    public function __construct()
    {
        $this->keywords = new ArrayCollection(); 
    }

    /**
     * @return Collection|Keyword[]
     */
    public function getKeywords(): Collection
    {
        return $this->keywords;
    }
    public function addKeyword(Keyword $keyword): self
    {
        if (!$this->keywords->contains($keyword)) {
            $this->keywords[] = $keyword;
        }
        return $this;
    }
    public function removeKeyword(Keyword $keyword): self
    {
        $this->keywords->removeElement($keyword);
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->createDate;
    }

    public function setCreateDate(\DateTimeInterface $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }
}
