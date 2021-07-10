<?php


class tribual
{
    private $id;
    private $nom;
    private $addresse;
    private $categorie;
    private $telephone;
    private $email;
    private $gouvernorat;
    private $doyen;

    /**
     * tribual constructor.
     * @param $nom
     * @param $addresse
     * @param $categorie
     * @param $telephone
     * @param $email
     * @param $gouvernorat
     * @param $doyen
     */
    public function __construct($nom, $addresse, $categorie, $telephone, $email, $gouvernorat, $doyen)
    {
        $this->nom = $nom;
        $this->addresse = $addresse;
        $this->categorie = $categorie;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->gouvernorat = $gouvernorat;
        $this->doyen = $doyen;
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

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * @param mixed $gouvernorat
     */
    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;
    }

    /**
     * @return mixed
     */
    public function getDoyen()
    {
        return $this->doyen;
    }

    /**
     * @param mixed $doyen
     */
    public function setDoyen($doyen)
    {
        $this->doyen = $doyen;
    }


}
