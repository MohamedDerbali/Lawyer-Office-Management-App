<?php


class Paiement
{
    private $id;
    private $titre;
    private $dateth;
    private $modalite;
    private $etat;
    private $datePr;
    private $fichier;
    private $idContentieux;
    private $montant;

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
     * Paiement constructor.
     * @param $titre
     * @param $dateth
     * @param $modalite
     * @param $etat
     * @param $datePr
     * @param $fichier
     * @param $idContentieux
     * @param $montant
     */
    public function __construct($titre, $dateth, $modalite, $etat, $datePr, $fichier, $idContentieux,$montant)
    {
        $this->titre = $titre;
        $this->dateth = $dateth;
        $this->modalite = $modalite;
        $this->etat = $etat;
        $this->datePr = $datePr;
        $this->fichier = $fichier;
        $this->idContentieux = $idContentieux;
        $this->montant = $montant;
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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDateth()
    {
        return $this->dateth;
    }

    /**
     * @param mixed $dateth
     */
    public function setDateth($dateth)
    {
        $this->dateth = $dateth;
    }

    /**
     * @return mixed
     */
    public function getModalite()
    {
        return $this->modalite;
    }

    /**
     * @param mixed $modalite
     */
    public function setModalite($modalite)
    {
        $this->modalite = $modalite;
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
    public function getDatePr()
    {
        return $this->datePr;
    }

    /**
     * @param mixed $datePr
     */
    public function setDatePr($datePr)
    {
        $this->datePr = $datePr;
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
