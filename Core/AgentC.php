<?php

include_once "config.php";
class AgentC
{


  function ajouterAjent($categorie){
    $sql="insert into Agent (nom, prenom, mail, password, adresse,idAdmin) values(:nom,:prenom, :mail, :password, :adresse,:idAdmin)";
    $db = config::getConnexion();
    try{
      $req=$db->prepare($sql);
      $nom=$categorie->getNom();
      $prenom=$categorie->getPrenom();
      $mail=$categorie->getMail();
      $password=$categorie->getPassword();
      $adresse=$categorie->getAdresse();

      $req->bindValue(':nom',$nom);
      $req->bindValue(':prenom',$prenom);
      $req->bindValue(':mail',$mail);
      $req->bindValue(':password',$password);
      $req->bindValue(':adresse',$adresse);
      $req->bindValue(':idAdmin',$categorie->getIdAdmin());
      $req->execute();

    }
    catch (Exception $e){
      echo 'Erreur: '.$e->getMessage();
    }

  }

  function AllAgent(){
    $sql="select * From Agent";
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
    function Allmission(){
        $sql="select * From mission";
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
    function AllmissionByagent($id){
        $sql="select * From mission where idagent=:nom";
        $db = config::getConnexion();
        try{
            $sth = $db->prepare($sql);
            $sth->bindValue(':nom',$id);
            $sth->execute();
            $liste = $sth->fetchAll();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
  function supprimerAgent($id){
    $sql="DELETE FROM Agent where id= :id";
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



  function recupererAgent($id){
    $sql="SELECT * from Agent where id= $id";
    $db = config::getConnexion();
    try{
      $sth = $db->prepare($sql);
      $sth->execute();
      $liste = $sth->fetch();
      return $liste;
    }
    catch (Exception $e){
      die('Erreur: '.$e->getMessage());
    }
  }





    function changestat($id){


        $sql="UPDATE mission SET status = :nom where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':nom',1);




            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }

    function update($agent,$id){


        $sql="UPDATE Agent SET nom = :nom,prenom = :prenom,mail = :mail ,adresse = :adresse ,password = :password where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$agent->getNom();
            $prenom=$agent->getPrenom();
            $mail=$agent->getMail();
            $adres=$agent->getAdresse();
            $passwordd=$agent->getPassword();
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':adresse',$adres);
            $req->bindValue(':password',$passwordd);




            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }


    function Login($email,$password){
        $sql="Select * from agent where mail = :email and password = :password";

        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':email',$email);
            $req->bindValue(':password',$password);
            $req->execute();
            $liste = $req->fetch();

            return $liste;;
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }


    }


function Mission($avocat,$agent,$mission){
    $sql="insert into mission (idavocat, idagent , mission) values(:idavocat,:idagent, :mission)";

        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':idavocat',$avocat);
            $req->bindValue(':idagent',$agent);
            $req->bindValue(':mission',$mission);
            $req->execute();


        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }


    }


}
