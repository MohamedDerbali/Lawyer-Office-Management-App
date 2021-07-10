<?php


class Fichier
{
    private $id;
private $nom;
private $fichier;
private $idcontentieux;

    /**
     * Rapport constructor.
     * @param $nom
     * @param $fichier
     * @param $idcontentieux
     */
    public function __construct($nom, $fichier, $idcontentieux)
    {
        $this->nom = $nom;
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
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setnom($nom)
    {
        $this->nom = $nom;
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