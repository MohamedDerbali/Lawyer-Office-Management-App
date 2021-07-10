<?php
include_once "config.php";

class seanceC
{

    function ajoutersc($client){
        $sql="insert into seance (libelle, datesc,  lieux, idcontentieux) values(:libelle, :datesc,:lieux, :idcontentieux)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $libelle=$client->getLibelle();
            $datesc=$client->getDatesc();

            $lieux=$client->getLieux();
            $idcontentieux=$client->getIdcontentieux();



            $req->bindValue(':libelle',$libelle);
            $req->bindValue(':datesc',$datesc);

            $req->bindValue(':lieux',$lieux);
            $req->bindValue(':idcontentieux',$idcontentieux);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function afficherAllsc(){
        $sql="select * From seance";
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
    function afficherAllscContentieux($id){
        $sql="select * From seance  where idContentieux = $id";
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
    function getsc($id){

        $sql="select * From seance where id = $id";
        $db = config::getConnexion();
        try{
            $sth = $db->prepare($sql);
            $sth->execute();
            $liste = $sth->fetchAll();

            return $liste;
        }
        catch (Exception $e){
            var_dump($e);
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifiersc($client,$id){


        $sql="UPDATE seance SET libelle= :libelle,datesc= :datesc,lieux= :lieux where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $libelle=$client->getLibelle();
            $datesc=$client->getDatesc();

            $lieux=$client->getLieux();



            $req->bindValue(':libelle',$libelle);
            $req->bindValue(':datesc',$datesc);

            $req->bindValue(':lieux',$lieux);

            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }




    function supprimersc($id){
        $sql="DELETE FROM seance where id= :id";
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
