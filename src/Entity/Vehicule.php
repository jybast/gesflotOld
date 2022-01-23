<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 10)]
    private $immatriculation;

    #[ORM\Column(type: 'date')]
    private $circulationAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $c1_titulaire;

    #[ORM\Column(type: 'boolean')]
    private $c4_proprietaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $c4_cotitulaire;

    #[ORM\Column(type: 'string', length: 255)]
    private $c3_adresse;

    #[ORM\Column(type: 'string', length: 100)]
    private $d1_marque;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $d2_version;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $d21_cnit;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $d3_commercial;

    #[ORM\Column(type: 'string', length: 50)]
    private $e_identification;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $f1_ptac;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $f2_masse;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $f3_ptra;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $g_poidsmarche;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $g1_poidsvide;

    #[ORM\Column(type: 'date')]
    private $i_certificatAt;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $j_categorie;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $j1_genre;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $j2_carrosserie;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $j3_nat;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $k_reception;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $p1_cylindree;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $p2_puissance;

    #[ORM\Column(type: 'string', length: 10)]
    private $p3_energie;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $p6_fiscal;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $q_kwkg;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $s1_assis;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $s2_debout;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $u1_sonore;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $u2_moteur;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $v7_co2;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $v9_classe;

    #[ORM\Column(type: 'date')]
    private $x1_visiteAt;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $y1_region;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $y2_formation;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $y3_ecotaxe;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $y4_gestion;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $y5_redevance;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2, nullable: true)]
    private $y6_total;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $longueur;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $largeur;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $hauteur;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $coffre;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $empattement;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $porteafaux;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $reservoir;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $conso_urbaine;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $conso_mixte;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $transmission;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $boite;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $pneumatiques;

    #[ORM\Column(type: 'date', nullable: true)]
    private $acheterAt;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $valeur_achat;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Image::class, orphanRemoval: true)]
    private $images;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Document::class, orphanRemoval: true)]
    private $documents;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Assurance::class)]
    private $assurances;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->assurances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getCirculationAt(): ?\DateTimeInterface
    {
        return $this->circulationAt;
    }

    public function setCirculationAt(\DateTimeInterface $circulationAt): self
    {
        $this->circulationAt = $circulationAt;

        return $this;
    }

    public function getC1Titulaire(): ?string
    {
        return $this->c1_titulaire;
    }

    public function setC1Titulaire(string $c1_titulaire): self
    {
        $this->c1_titulaire = $c1_titulaire;

        return $this;
    }

    public function getC4Proprietaire(): ?bool
    {
        return $this->c4_proprietaire;
    }

    public function setC4Proprietaire(bool $c4_proprietaire): self
    {
        $this->c4_proprietaire = $c4_proprietaire;

        return $this;
    }

    public function getC4Cotitulaire(): ?string
    {
        return $this->c4_cotitulaire;
    }

    public function setC4Cotitulaire(?string $c4_cotitulaire): self
    {
        $this->c4_cotitulaire = $c4_cotitulaire;

        return $this;
    }

    public function getC3Adresse(): ?string
    {
        return $this->c3_adresse;
    }

    public function setC3Adresse(string $c3_adresse): self
    {
        $this->c3_adresse = $c3_adresse;

        return $this;
    }

    public function getD1Marque(): ?string
    {
        return $this->d1_marque;
    }

    public function setD1Marque(string $d1_marque): self
    {
        $this->d1_marque = $d1_marque;

        return $this;
    }

    public function getD2Version(): ?string
    {
        return $this->d2_version;
    }

    public function setD2Version(?string $d2_version): self
    {
        $this->d2_version = $d2_version;

        return $this;
    }

    public function getD21Cnit(): ?string
    {
        return $this->d21_cnit;
    }

    public function setD21Cnit(?string $d21_cnit): self
    {
        $this->d21_cnit = $d21_cnit;

        return $this;
    }

    public function getD3Commercial(): ?string
    {
        return $this->d3_commercial;
    }

    public function setD3Commercial(?string $d3_commercial): self
    {
        $this->d3_commercial = $d3_commercial;

        return $this;
    }

    public function getEIdentification(): ?string
    {
        return $this->e_identification;
    }

    public function setEIdentification(string $e_identification): self
    {
        $this->e_identification = $e_identification;

        return $this;
    }

    public function getF1Ptac(): ?int
    {
        return $this->f1_ptac;
    }

    public function setF1Ptac(?int $f1_ptac): self
    {
        $this->f1_ptac = $f1_ptac;

        return $this;
    }

    public function getF2Masse(): ?int
    {
        return $this->f2_masse;
    }

    public function setF2Masse(?int $f2_masse): self
    {
        $this->f2_masse = $f2_masse;

        return $this;
    }

    public function getF3Ptra(): ?int
    {
        return $this->f3_ptra;
    }

    public function setF3Ptra(?int $f3_ptra): self
    {
        $this->f3_ptra = $f3_ptra;

        return $this;
    }

    public function getGPoidsmarche(): ?int
    {
        return $this->g_poidsmarche;
    }

    public function setGPoidsmarche(?int $g_poidsmarche): self
    {
        $this->g_poidsmarche = $g_poidsmarche;

        return $this;
    }

    public function getG1Poidsvide(): ?int
    {
        return $this->g1_poidsvide;
    }

    public function setG1Poidsvide(?int $g1_poidsvide): self
    {
        $this->g1_poidsvide = $g1_poidsvide;

        return $this;
    }

    public function getICertificatAt(): ?\DateTimeInterface
    {
        return $this->i_certificatAt;
    }

    public function setICertificatAt(\DateTimeInterface $i_certificatAt): self
    {
        $this->i_certificatAt = $i_certificatAt;

        return $this;
    }

    public function getJCategorie(): ?string
    {
        return $this->j_categorie;
    }

    public function setJCategorie(string $j_categorie): self
    {
        $this->j_categorie = $j_categorie;

        return $this;
    }

    public function getJ1Genre(): ?string
    {
        return $this->j1_genre;
    }

    public function setJ1Genre(?string $j1_genre): self
    {
        $this->j1_genre = $j1_genre;

        return $this;
    }

    public function getJ2Carrosserie(): ?string
    {
        return $this->j2_carrosserie;
    }

    public function setJ2Carrosserie(?string $j2_carrosserie): self
    {
        $this->j2_carrosserie = $j2_carrosserie;

        return $this;
    }

    public function getJ3Nat(): ?string
    {
        return $this->j3_nat;
    }

    public function setJ3Nat(?string $j3_nat): self
    {
        $this->j3_nat = $j3_nat;

        return $this;
    }

    public function getKReception(): ?string
    {
        return $this->k_reception;
    }

    public function setKReception(?string $k_reception): self
    {
        $this->k_reception = $k_reception;

        return $this;
    }

    public function getP1Cylindree(): ?int
    {
        return $this->p1_cylindree;
    }

    public function setP1Cylindree(?int $p1_cylindree): self
    {
        $this->p1_cylindree = $p1_cylindree;

        return $this;
    }

    public function getP2Puissance(): ?int
    {
        return $this->p2_puissance;
    }

    public function setP2Puissance(?int $p2_puissance): self
    {
        $this->p2_puissance = $p2_puissance;

        return $this;
    }

    public function getP3Energie(): ?string
    {
        return $this->p3_energie;
    }

    public function setP3Energie(string $p3_energie): self
    {
        $this->p3_energie = $p3_energie;

        return $this;
    }

    public function getP6Fiscal(): ?int
    {
        return $this->p6_fiscal;
    }

    public function setP6Fiscal(?int $p6_fiscal): self
    {
        $this->p6_fiscal = $p6_fiscal;

        return $this;
    }

    public function getQKwkg(): ?int
    {
        return $this->q_kwkg;
    }

    public function setQKwkg(?int $q_kwkg): self
    {
        $this->q_kwkg = $q_kwkg;

        return $this;
    }

    public function getS1Assis(): ?int
    {
        return $this->s1_assis;
    }

    public function setS1Assis(?int $s1_assis): self
    {
        $this->s1_assis = $s1_assis;

        return $this;
    }

    public function getS2Debout(): ?int
    {
        return $this->s2_debout;
    }

    public function setS2Debout(?int $s2_debout): self
    {
        $this->s2_debout = $s2_debout;

        return $this;
    }

    public function getU1Sonore(): ?int
    {
        return $this->u1_sonore;
    }

    public function setU1Sonore(?int $u1_sonore): self
    {
        $this->u1_sonore = $u1_sonore;

        return $this;
    }

    public function getU2Moteur(): ?int
    {
        return $this->u2_moteur;
    }

    public function setU2Moteur(?int $u2_moteur): self
    {
        $this->u2_moteur = $u2_moteur;

        return $this;
    }

    public function getV7Co2(): ?int
    {
        return $this->v7_co2;
    }

    public function setV7Co2(?int $v7_co2): self
    {
        $this->v7_co2 = $v7_co2;

        return $this;
    }

    public function getV9Classe(): ?string
    {
        return $this->v9_classe;
    }

    public function setV9Classe(?string $v9_classe): self
    {
        $this->v9_classe = $v9_classe;

        return $this;
    }

    public function getX1VisiteAt(): ?\DateTimeInterface
    {
        return $this->x1_visiteAt;
    }

    public function setX1VisiteAt(\DateTimeInterface $x1_visiteAt): self
    {
        $this->x1_visiteAt = $x1_visiteAt;

        return $this;
    }

    public function getY1Region(): ?int
    {
        return $this->y1_region;
    }

    public function setY1Region(?int $y1_region): self
    {
        $this->y1_region = $y1_region;

        return $this;
    }

    public function getY2Formation(): ?int
    {
        return $this->y2_formation;
    }

    public function setY2Formation(?int $y2_formation): self
    {
        $this->y2_formation = $y2_formation;

        return $this;
    }

    public function getY3Ecotaxe(): ?int
    {
        return $this->y3_ecotaxe;
    }

    public function setY3Ecotaxe(?int $y3_ecotaxe): self
    {
        $this->y3_ecotaxe = $y3_ecotaxe;

        return $this;
    }

    public function getY4Gestion(): ?int
    {
        return $this->y4_gestion;
    }

    public function setY4Gestion(?int $y4_gestion): self
    {
        $this->y4_gestion = $y4_gestion;

        return $this;
    }

    public function getY5Redevance(): ?string
    {
        return $this->y5_redevance;
    }

    public function setY5Redevance(?string $y5_redevance): self
    {
        $this->y5_redevance = $y5_redevance;

        return $this;
    }

    public function getY6Total(): ?string
    {
        return $this->y6_total;
    }

    public function setY6Total(?string $y6_total): self
    {
        $this->y6_total = $y6_total;

        return $this;
    }

    public function getLongueur(): ?string
    {
        return $this->longueur;
    }

    public function setLongueur(?string $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?string
    {
        return $this->largeur;
    }

    public function setLargeur(?string $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getHauteur(): ?string
    {
        return $this->hauteur;
    }

    public function setHauteur(string $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getCoffre(): ?int
    {
        return $this->coffre;
    }

    public function setCoffre(?int $coffre): self
    {
        $this->coffre = $coffre;

        return $this;
    }

    public function getEmpattement(): ?string
    {
        return $this->empattement;
    }

    public function setEmpattement(?string $empattement): self
    {
        $this->empattement = $empattement;

        return $this;
    }

    public function getPorteafaux(): ?string
    {
        return $this->porteafaux;
    }

    public function setPorteafaux(string $porteafaux): self
    {
        $this->porteafaux = $porteafaux;

        return $this;
    }

    public function getReservoir(): ?int
    {
        return $this->reservoir;
    }

    public function setReservoir(?int $reservoir): self
    {
        $this->reservoir = $reservoir;

        return $this;
    }

    public function getConsoUrbaine(): ?string
    {
        return $this->conso_urbaine;
    }

    public function setConsoUrbaine(?string $conso_urbaine): self
    {
        $this->conso_urbaine = $conso_urbaine;

        return $this;
    }

    public function getConsoMixte(): ?string
    {
        return $this->conso_mixte;
    }

    public function setConsoMixte(?string $conso_mixte): self
    {
        $this->conso_mixte = $conso_mixte;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(?string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getBoite(): ?string
    {
        return $this->boite;
    }

    public function setBoite(?string $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    public function getPneumatiques(): ?string
    {
        return $this->pneumatiques;
    }

    public function setPneumatiques(?string $pneumatiques): self
    {
        $this->pneumatiques = $pneumatiques;

        return $this;
    }

    public function getAcheterAt(): ?\DateTimeInterface
    {
        return $this->acheterAt;
    }

    public function setAcheterAt(?\DateTimeInterface $acheterAt): self
    {
        $this->acheterAt = $acheterAt;

        return $this;
    }

    public function getValeurAchat(): ?string
    {
        return $this->valeur_achat;
    }

    public function setValeurAchat(?string $valeur_achat): self
    {
        $this->valeur_achat = $valeur_achat;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setVehicule($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getVehicule() === $this) {
                $image->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setVehicule($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getVehicule() === $this) {
                $document->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Assurance[]
     */
    public function getAssurances(): Collection
    {
        return $this->assurances;
    }

    public function addAssurance(Assurance $assurance): self
    {
        if (!$this->assurances->contains($assurance)) {
            $this->assurances[] = $assurance;
            $assurance->setVehicule($this);
        }

        return $this;
    }

    public function removeAssurance(Assurance $assurance): self
    {
        if ($this->assurances->removeElement($assurance)) {
            // set the owning side to null (unless already changed)
            if ($assurance->getVehicule() === $this) {
                $assurance->setVehicule(null);
            }
        }

        return $this;
    }
}
