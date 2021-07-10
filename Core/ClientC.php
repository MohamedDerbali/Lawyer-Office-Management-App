<?php
include_once "config.php";

class ClientC
{

    function ajouterClient($client){
        $sql="insert into Client (nom, prenom, identite, tel, mail,fix,adresse,datenaissance) values(:nom,:prenom, :identite, :tel,:mail,:fix,:adresse,:datenaissance)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$client->getNom();
            $prenom=$client->getPrenom();
            $mail=$client->getMail();
            $tel=$client->getTel();
            $identite=$client->getIdentite();
            $fix=$client->getFix();
            $addresse=$client->getAddresse();
            $dateNaissance=$client->getDatenaissance();



            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':identite',$identite);
            if($tel=='')
            {
                $req->bindValue(':tel',null);}
            else
            {$req->bindValue(':tel',$tel);}
            if($mail=='')
            {
                $req->bindValue(':mail',null);}
            else
            {$req->bindValue(':mail',$mail);}
            if($fix=='')
            {
                $req->bindValue(':fix',null);}
            else{  $req->bindValue(':fix',$fix);}
            $req->bindValue(':adresse',$addresse);
            $req->bindValue(':datenaissance',$dateNaissance);


            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        return $db->lastInsertId();
    }

    function afficherAllClient(){
        $sql="select * From Client";
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
    function getClientbyId($id){

        $sql="select * From Client where id = $id";
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
    function getClientbyCin($cin){

        $sql="select * From Client where identite = $cin";
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
    function modifierClient($client,$id){


        $sql="UPDATE Client SET nom = :nom,prenom= :prenom,mail= :mail,identite= :identite,tel= :tel,mail= :mail,fix= :fix,adresse= :adresse,datenaissance= :datenaissance where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$client->getNom();
            $prenom=$client->getPrenom();
            $mail=$client->getMail();
            $tel=$client->getTel();
            $identite=$client->getIdentite();
            $fix=$client->getFix();
            $addresse=$client->getAddresse();
            $dateNaissance=$client->getDatenaissance();



            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':identite',$identite);

            if($tel=='')
            {
                $req->bindValue(':tel',null);}
            else
            {$req->bindValue(':tel',$tel);}
            if($mail=='')
            {
                $req->bindValue(':mail',null);}
            else
            {$req->bindValue(':mail',$mail);}
            if($fix=='')
            {
                $req->bindValue(':fix',null);}
            else{  $req->bindValue(':fix',$fix);}
            $req->bindValue(':adresse',$addresse);
            $req->bindValue(':datenaissance',$dateNaissance);


            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }




    function supprimerClient($id){
        $sql="DELETE FROM Client where id= :id";
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