<?php


class Charge
{
    private $id;
    private $montant;
    private $etat;
    private $datecharge;
    private $fichier;
    private $idContentieux;

    /**
     * Charge constructor.
     * @param $montant
     * @param $etat
     * @param $datecharge
     * @param $fichier
     * @param $idContentieux
     */
    public function __construct($montant, $etat, $datecharge, $fichier, $idContentieux)
    {
        $this->montant = $montant;
        $this->etat = $etat;
        $this->datecharge = $datecharge;
        $this->fichier = $fichier;
        $this->idContentieux = $idContentieux;
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
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getDatecharge()
    {
        return $this->datecharge;
    }

    /**
     * @param mixed $datecharge
     */
    public function setDatecharge($datecharge)
    {
        $this->datecharge = $datecharge;
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


}
