<?php


class historiquecalendar
{
private $id;
private $idcalendar;
private $idagent;
private $idavocat;
private $descriptionModif;
private $timemodif;

    /**
     * historiquecalendar constructor.
     * @param $idcalendar
     * @param $idagent
     * @param $idavocat
     * @param $descriptionModif
     * @param $timemodif
     */
    public function __construct($idcalendar, $idagent, $idavocat, $descriptionModif)
    {
        $this->idcalendar = $idcalendar;
        $this->idagent = $idagent;
        $this->idavocat = $idavocat;
        $this->descriptionModif = $descriptionModif;

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
    public function getIdcalendar()
    {
        return $this->idcalendar;
    }

    /**
     * @param mixed $idcalendar
     */
    public function setIdcalendar($idcalendar)
    {
        $this->idcalendar = $idcalendar;
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
    public function getIdavocat()
    {
        return $this->idavocat;
    }

    /**
     * @param mixed $idavocat
     */
    public function setIdavocat($idavocat)
    {
        $this->idavocat = $idavocat;
    }

    /**
     * @return mixed
     */
    public function getDescriptionModif()
    {
        return $this->descriptionModif;
    }

    /**
     * @param mixed $descriptionModif
     */
    public function setDescriptionModif($descriptionModif)
    {
        $this->descriptionModif = $descriptionModif;
    }

    /**
     * @return mixed
     */
    public function getTimemodif()
    {
        return $this->timemodif;
    }

    /**
     * @param mixed $timemodif
     */
    public function setTimemodif($timemodif)
    {
        $this->timemodif = $timemodif;
    }

}