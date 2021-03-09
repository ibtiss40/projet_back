<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $url;

  

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="media")
     */
    private $idProjet;

    /**
     * @ORM\OneToOne(targetEntity=Portfolio::class, mappedBy="id_image", cascade={"persist", "remove"})
     */
    private $portfolio;

    /**
     * @ORM\OneToOne(targetEntity=Cv::class, mappedBy="id_image", cascade={"persist", "remove"})
     */
    private $cv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

   

    public function getIdProjet(): ?Projet
    {
        return $this->idProjet;
    }

    public function setIdProjet(?Projet $idProjet): self
    {
        $this->idProjet = $idProjet;

        return $this;
    }

    public function getPortfolio(): ?Portfolio
    {
        return $this->portfolio;
    }

    public function setPortfolio(?Portfolio $portfolio): self
    {
        // unset the owning side of the relation if necessary
        if ($portfolio === null && $this->portfolio !== null) {
            $this->portfolio->setIdImage(null);
        }

        // set the owning side of the relation if necessary
        if ($portfolio !== null && $portfolio->getIdImage() !== $this) {
            $portfolio->setIdImage($this);
        }

        $this->portfolio = $portfolio;

        return $this;
    }

    public function getCv(): ?Cv
    {
        return $this->cv;
    }

    public function setCv(?Cv $cv): self
    {
        // unset the owning side of the relation if necessary
        if ($cv === null && $this->cv !== null) {
            $this->cv->setIdImage(null);
        }

        // set the owning side of the relation if necessary
        if ($cv !== null && $cv->getIdImage() !== $this) {
            $cv->setIdImage($this);
        }

        $this->cv = $cv;

        return $this;
    }
}
