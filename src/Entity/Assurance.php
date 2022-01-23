<?php

namespace App\Entity;

use App\Repository\AssuranceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssuranceRepository::class)]
class Assurance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $compagnie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $mail;

    #[ORM\Column(type: 'date')]
    private $valideAt;

    #[ORM\Column(type: 'date')]
    private $expireAt;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2, nullable: true)]
    private $montant;

    #[ORM\ManyToOne(targetEntity: Vehicule::class, inversedBy: 'assurances')]
    #[ORM\JoinColumn(nullable: false)]
    private $vehicule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompagnie(): ?string
    {
        return $this->compagnie;
    }

    public function setCompagnie(string $compagnie): self
    {
        $this->compagnie = $compagnie;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getValideAt(): ?\DateTimeInterface
    {
        return $this->valideAt;
    }

    public function setValideAt(\DateTimeInterface $valideAt): self
    {
        $this->valideAt = $valideAt;

        return $this;
    }

    public function getExpireAt(): ?\DateTimeInterface
    {
        return $this->expireAt;
    }

    public function setExpireAt(\DateTimeInterface $expireAt): self
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}
