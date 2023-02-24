<?php

namespace App\Entity;

use App\Repository\ExemplaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExemplaireRepository::class)]
class Exemplaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ouvrage $ouvrage = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personne $emprunteur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bibliotheque $bibliotheque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOuvrage(): ?Ouvrage
    {
        return $this->ouvrage;
    }

    public function setOuvrage(?Ouvrage $ouvrage): self
    {
        $this->ouvrage = $ouvrage;

        return $this;
    }

    public function getEmprunteur(): ?Personne
    {
        return $this->emprunteur;
    }

    public function setEmprunteur(?Personne $emprunteur): self
    {
        $this->emprunteur = $emprunteur;

        return $this;
    }

    public function getBibliotheque(): ?Bibliotheque
    {
        return $this->bibliotheque;
    }

    public function setBibliotheque(?Bibliotheque $bibliotheque): self
    {
        $this->bibliotheque = $bibliotheque;

        return $this;
    }
}
