<?php


class Rapport
{
    private $id;
private $libelle;
private $fichier;
private $idcontentieux;

    /**
     * Rapport constructor.
     * @param $libelle
     * @param $fichier
     * @param $idcontentieux
     */
    public function __construct($libelle, $fichier, $idcontentieux)
    {
        $this->libelle = $libelle;
        $this->fichier = $fichier;
        $this->idcontentieux = $idcontentieux;
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
    public function getIdcontentieux()
    {
        return $this->idcontentieux;
    }

    /**
     * @param mixed $idcontentieux
     */
    public function setIdcontentieux($idcontentieux)
    {
        $this->idcontentieux = $idcontentieux;
    }

}