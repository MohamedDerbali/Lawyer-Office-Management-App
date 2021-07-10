<?php


class justificatif
{private $id;
private $idContentieux;

private $libelle;
private $fichier;
private $categorie;

    /**
     * justificatif constructor.
     * @param $id
     * @param $idContentieux
     * @param $libelle
     * @param $fichier
     * @param $categorie
     */
    public function __construct( $idContentieux, $libelle, $fichier, $categorie)
    {

        $this->idContentieux = $idContentieux;
        $this->libelle = $libelle;
        $this->fichier = $fichier;
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdContentieux()
    {
        return $this->idContentieux;
    }

    /**
     * @param mixed $idContentieux
     */
    public function setIdContentieux($idContentieux)
    {
        $this->idContentieux = $idContentieux;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * @param mixed $fichier
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }


}