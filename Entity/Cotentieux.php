<?php


class Cotentieux
{
private $id;
private $idClient;
private $Categorie;
private $statut;
private $dateContentieux;
private $idagent;
private $codeinterne;
private $objectif;
private $idTribual;
private $petition;
private $idfile;
private $sujet;

    /**
     * Cotentieux constructor.
     * @param $id
     * @param $idClient
     * @param $Categorie
     * @param $statut
     * @param $dateContentieux
     * @param $idagent
     * @param $codeinterne
     * @param $objectif
     * @param $idTribual
     * @param $petition
     * @param $sujet
     */
    public function __construct($idagent, $idClient, $Categorie, $statut, $dateContentieux, $codeinterne, $objectif, $idTribual, $petition, $sujet)
    {

        $this->idClient = $idClient;
        $this->Categorie = $Categorie;
        $this->statut = $statut;
        $this->dateContentieux = $dateContentieux;
        $this->idagent = $idagent;
        $this->codeinterne = $codeinterne;
        $this->objectif = $objectif;
        $this->idTribual = $idTribual;
        $this->petition = $petition;
        $this->sujet = $sujet;
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
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->Categorie;
    }

    /**
     * @param mixed $Categorie
     */
    public function setCategorie($Categorie)
    {
        $this->Categorie = $Categorie;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getDateContentieux()
    {
        return $this->dateContentieux;
    }

    /**
     * @param mixed $dateContentieux
     */
    public function setDateContentieux($dateContentieux)
    {
        $this->dateContentieux = $dateContentieux;
    }

    /**
     * @return mixed
     */
    public function getIdagent()
    {

        return $this->idagent;
    }

    /**
     * @param mixed $idagent
     */
    public function setIdagent($idagent)
    {
        $this->idagent = $idagent;
    }

    /**
     * @return mixed
     */
    public function getCodeinterne()
    {
        return $this->codeinterne;
    }

    /**
     * @param mixed $codeinterne
     */
    public function setCodeinterne($codeinterne)
    {
        $this->codeinterne = $codeinterne;
    }

    /**
     * @return mixed
     */
    public function getObjectif()
    {

        return $this->objectif;
    }

    /**
     * @param mixed $objectif
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;
    }

    /**
     * @return mixed
     */
    public function getIdTribual()
    {

        return $this->idTribual;
    }

    /**
     * @param mixed $idTribual
     */
    public function setIdTribual($idTribual)
    {
        $this->idTribual = $idTribual;
    }

    /**
     * @return mixed
     */
    public function getPetition()
    {

        return $this->petition;
    }

    /**
     * @param mixed $petition
     */
    public function setPetition($petition)
    {
        $this->petition = $petition;
    }

    /**
     * @return mixed
     */
    public function getIdfile()
    {

        return $this->idfile;
    }

    /**
     * @param mixed $idfile
     */
    public function setIdfile($idfile)
    {
        $this->idfile = $idfile;
    }

    /**
     * @return mixed
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @param mixed $sujet
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    }


}
