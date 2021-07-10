<?php
class jugementcalendar{
private $id;
private $title;
private $start;
private $end;
private $backgroundColor;
private $allDay;
private $idcotentieux;
private $Adversaire;
private $tpe;
private $rappelPersonalise;
private $idavocat;
private $ClientRendezvous;
private $tribunal;
    /**
     * jugementcalendar constructor.
     * @param $title
     * @param $start
     * @param $end
     * @param $backgroundColor
     * @param $allDay
     * @param $idcotentieux
     * @param $Adversaire
     * @param $tpe
     * @param $rappelPersonalise
     */
    public function __construct($title, $start, $end, $backgroundColor, $idcotentieux, $Adversaire, $tpe, $rappelPersonalise)
    {
        $this->title = $title;
        $this->start = $start;
        $this->end = $end;
        $this->backgroundColor = $backgroundColor;
        $this->idcotentieux = $idcotentieux;
        $this->Adversaire = $Adversaire;
        $this->tpe = $tpe;
        $this->rappelPersonalise = $rappelPersonalise;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return mixed
     */
    public function getIdcotentieux()
    {
        return $this->idcotentieux;
    }

    /**
     * @param mixed $idcotentieux
     */
    public function setIdcotentieux($idcotentieux)
    {
        $this->idcotentieux = $idcotentieux;
    }

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @return mixed
     */
    public function getAllDay()
    {
        return $this->allDay;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @param mixed $backgroundColor
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @param mixed $allDay
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;
    }

    /**
     * @return mixed
     */
    public function getAdversaire()
    {
        return $this->Adversaire;
    }

    /**
     * @param mixed $Adversaire
     */
    public function setAdversaire($Adversaire)
    {
        $this->Adversaire = $Adversaire;
    }

    /**
     * @return mixed
     */
    public function getTpe()
    {
        return $this->tpe;
    }

    /**
     * @param mixed $tpe
     */
    public function setTpe($tpe)
    {
        $this->tpe = $tpe;
    }

    /**
     * @return mixed
     */
    public function getRappelPersonalise()
    {
        return $this->rappelPersonalise;
    }

    /**
     * @param mixed $rappelPersonalise
     */
    public function setRappelPersonalise($rappelPersonalise)
    {
        $this->rappelPersonalise = $rappelPersonalise;
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
    public function getClientRendezvous()
    {
        return $this->ClientRendezvous;
    }

    /**
     * @param mixed $ClientRendezvous
     */
    public function setClientRendezvous($ClientRendezvous)
    {
        $this->ClientRendezvous = $ClientRendezvous;
    }

    /**
     * @return mixed
     */
    public function getTribunal()
    {
        return $this->tribunal;
    }

    /**
     * @param mixed $tribunal
     */
    public function setTribunal($tribunal)
    {
        $this->tribunal = $tribunal;
    }

}