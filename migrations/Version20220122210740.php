<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220122210740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, immatriculation VARCHAR(10) NOT NULL, circulation_at DATE NOT NULL, c1_titulaire VARCHAR(255) NOT NULL, c4_proprietaire TINYINT(1) NOT NULL, c4_cotitulaire VARCHAR(255) DEFAULT NULL, c3_adresse VARCHAR(255) NOT NULL, d1_marque VARCHAR(100) NOT NULL, d2_version VARCHAR(100) DEFAULT NULL, d21_cnit VARCHAR(50) DEFAULT NULL, d3_commercial VARCHAR(50) DEFAULT NULL, e_identification VARCHAR(50) NOT NULL, f1_ptac INT DEFAULT NULL, f2_masse INT DEFAULT NULL, f3_ptra INT DEFAULT NULL, g_poidsmarche INT DEFAULT NULL, g1_poidsvide INT DEFAULT NULL, i_certificat_at DATE NOT NULL, j_categorie VARCHAR(10) DEFAULT NULL, j1_genre VARCHAR(50) DEFAULT NULL, j2_carrosserie VARCHAR(10) DEFAULT NULL, j3_nat VARCHAR(20) DEFAULT NULL, k_reception VARCHAR(50) DEFAULT NULL, p1_cylindree INT DEFAULT NULL, p2_puissance INT DEFAULT NULL, p3_energie VARCHAR(10) NOT NULL, p6_fiscal INT DEFAULT NULL, q_kwkg INT DEFAULT NULL, s1_assis INT DEFAULT NULL, s2_debout INT DEFAULT NULL, u1_sonore INT DEFAULT NULL, u2_moteur INT DEFAULT NULL, v7_co2 INT DEFAULT NULL, v9_classe VARCHAR(50) DEFAULT NULL, x1_visite_at DATE NOT NULL, y1_region INT DEFAULT NULL, y2_formation INT DEFAULT NULL, y3_ecotaxe INT DEFAULT NULL, y4_gestion INT DEFAULT NULL, y5_redevance NUMERIC(5, 2) DEFAULT NULL, y6_total NUMERIC(6, 2) DEFAULT NULL, longueur NUMERIC(5, 2) DEFAULT NULL, largeur NUMERIC(5, 2) DEFAULT NULL, hauteur NUMERIC(5, 2) DEFAULT NULL, coffre INT DEFAULT NULL, empattement NUMERIC(5, 2) DEFAULT NULL, porteafaux NUMERIC(5, 2) DEFAULT NULL, reservoir INT DEFAULT NULL, conso_urbaine NUMERIC(5, 2) DEFAULT NULL, conso_mixte NUMERIC(5, 2) DEFAULT NULL, transmission VARCHAR(10) DEFAULT NULL, boite VARCHAR(20) DEFAULT NULL, pneumatiques VARCHAR(20) DEFAULT NULL, acheter_at DATE DEFAULT NULL, valeur_achat NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicule');
    }
}
