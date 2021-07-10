<?php


class seance
{
    private $id;
private $libelle;
private $datesc;

private $lieux;
private $idcontentieux;

    /**
     * seance constructor.
     * @param $libelle
     * @param $datesc
     * @param $lieux
     * @param $idcontentieux
     */
    public function __construct($libelle, $datesc, $lieux, $idcontentieux)
    {
        $this->libelle = $libelle;
        $this->datesc = $datesc;
        $this->lieux = $lieux;
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
    public function getDatesc()
    {
        return $this->datesc;
    }

    /**
     * @param mixed $datesc
     */
    public function setDatesc($datesc)
    {
        $this->datesc = $datesc;
    }


    /**
     * @return mixed
     */
    public function getLieux()
    {
        return $this->lieux;
    }

    /**
     * @param mixed $lieux
     */
    public function setLieux($lieux)
    {
        $this->lieux = $lieux;
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
