<?php


class fichierC
{
    function ajouterfichier($client){
        $sql="insert into fichier (nom , fichier, idcontentieux) values(:nom , :fichier, :idcontentieux)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$client->getnom();
            $fichier=$client->getFichier();
            $idcontentieux=$client->getIdcontentieux();


            $req->bindValue(':nom',$nom);
            $req->bindValue(':fichier',$fichier);
            $req->bindValue(':idcontentieux',$idcontentieux);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function afficherAllfichier(){
        $sql="select * From fichier";
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
    function getfichier($id){

        $sql="select * From fichier where id = $id";
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

    function modifierfichier($client,$id){


        $sql="UPDATE fichier SET nom = :nom,fichier= :fichier,idcontentieux= :idcontentieux where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$client->getnom();
            $fichier=$client->getFichier();
            $idcontentieux=$client->getIdcontentieux();


            $req->bindValue(':nom',$nom);
            $req->bindValue(':fichier',$fichier);
            $req->bindValue(':idcontentieux',$idcontentieux);


            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }




    function supprimerfichier($id){
        $sql="DELETE FROM fichier where id= :id";
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