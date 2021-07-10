<?php
include_once "config.php";

class justificatifC
{

    function ajouterjust($justif){
        $sql="insert into justificatif (idContentieux, libelle, fichier, categorie) values(:idContentieux, :libelle, :fichier, :categorie)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $idContentieux=$justif->getIdContentieux();
            $libelle=$justif->getLibelle();
            $fichier=$justif->getFichier();
            $categorie=$justif->getCategorie();

            $req->bindValue(':idContentieux',$idContentieux);
            $req->bindValue(':libelle',$libelle);
            $req->bindValue(':fichier',$fichier);
            $req->bindValue(':categorie',$categorie);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function afficherAlljust($x){
        $sql="select * From justificatif where idContentieux=$x";
        $db = config::getConnexion();
        try{
            $sth = $db->prepare($sql);
            $sth->execute();
            $liste = $sth->fetchAll();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function getjustbyId($id){

        $sql="select * From justificatif where id = $id";
        $db = config::getConnexion();
        try{
            $sth = $db->prepare($sql);
            $sth->execute();
            $liste = $sth->fetchAll();

            return $liste;
        }
        catch (Exception $e){

            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierjust($justif,$id){
var_dump($id);

        $sql="UPDATE justificatif SET libelle= :libelle,fichier= :fichier,categorie= :categorie where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $libelle=$justif->getLibelle();
            $fichier=$justif->getFichier();
            $categorie=$justif->getCategorie();


            $req->bindValue(':libelle',$libelle);

            $req->bindValue(':categorie',$categorie);

            if($fichier!="")
            {
                $req->bindValue(':fichier',$fichier);
            }
            else
            {foreach ( $this->getjustbyId($id) as $j)
                $req->bindValue(':fichier',$j['fichier']);            }
            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }




    function supprimerjust($id){
        $sql="DELETE FROM justificatif where id= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
