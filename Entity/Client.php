<?php


class Client
{
private $id;
private $nom;
private $prenom;
private $identite;
private $tel;
private $mail;
private $addresse;
private $fix;
private $datenaissance;


    /**
     * Client constructor.
     * @param $nom
     * @param $prenom
     * @param $identite
     * @param $tel
     * @param $mail
     * @param $addresse
     * @param $fix
     * @param $datenaissance
     * @param $idagent
     */
    public function __construct($nom, $prenom, $identite, $tel, $mail, $addresse, $fix, $datenaissance)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->identite = $identite;
        $this->tel = $tel;
        $this->mail = $mail;
        $this->addresse = $addresse;
        $this->fix = $fix;
        $this->datenaissance = $datenaissance;
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
    public function getNom()
    {
        return $this->nom;
    }



    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getIdentite()
    {
        return $this->identite;
    }

    /**
     * @param mixed $identite
     */
    public function setIdentite($identite)
    {
        $this->identite = $identite;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * @param mixed $addresse
     */
    public function setAddresse($addresse)
    {
        $this->addresse = $addresse;
    }

    /**
     * @return mixed
     */
    public function getFix()
    {
        return $this->fix;
    }

    /**
     * @param mixed $fix
     */
    public function setFix($fix)
    {
        $this->fix = $fix;
    }

    /**
     * @return mixed
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * @param mixed $datenaissance
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;
    }


}
