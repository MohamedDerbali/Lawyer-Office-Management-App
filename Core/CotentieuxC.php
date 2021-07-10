<?php
include_once "config.php";

class CotentieuxC
{

    function ajouterContentieux($client){
        $sql="insert into contentieux (idClient, Categorie, statut, dateContentieux, idagent,codeinterne,objectif,idTribual,petition,sujet) values(:idClient, :Categorie, :statut, :dateContentieux, :idagent,:codeinterne,:objectif,:idTribual,:petition,:sujet)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $idClient=$client->getIdClient();
            $Categorie=$client->getCategorie();
            $statut=$client->getStatut();
            $dateContentieux=$client->getDateContentieux();
            $idagent=$client->getIdagent();
            $codeinterne=$client->getCodeinterne();
            $objectif=$client->getObjectif();
            $idTribual=$client->getIdTribual();
            $petition=$client->getPetition();

            $sujet=$client->getSujet();


            $req->bindValue(':idClient',$idClient);
            $req->bindValue(':Categorie',$Categorie);
            $req->bindValue(':statut',$statut);
            $req->bindValue(':dateContentieux',$dateContentieux);
            $req->bindValue(':idagent',$idagent);
            $req->bindValue(':codeinterne',$codeinterne);
            $req->bindValue(':objectif',$objectif);
            $req->bindValue(':idTribual',$idTribual);
            $req->bindValue(':petition',$petition);
            $req->bindValue(':sujet',$sujet);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        return $db->lastInsertId();
    }

    function afficherAllContentieux(){
        $sql="SELECT c.nom,c.prenom,ct.* FROM contentieux ct INNER JOIN client c ON ct.idClient = c.id";
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
    function afficherAllContentieuxAgent($id){
        $sql="SELECT c.nom,c.prenom,ct.* FROM contentieux ct INNER JOIN client c ON ct.idClient = c.id ";
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
    function afficherAllContentieuxClient($id){
        $sql="SELECT c.nom,c.prenom,ct.* FROM contentieux ct INNER JOIN client c ON ct.idClient = c.id where ct.idclient=$id";
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
    function getContentieuxByNumAffaire($numAffaire){
        $sql="SELECT * FROM contentieux where codeinterne= $numAffaire";
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
    function getContentieuxbyId($id){

        $sql="select * From contentieux where id = $id";
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

    function modifierContentieux($client,$id){

        $sql="UPDATE contentieux SET idClient= :idClient,Categorie= :Categorie,statut= :statut,dateContentieux= :dateContentieux,idagent= :idagent,codeinterne= :codeinterne,objectif= :objectif,idTribual= :idTribual,petition= :petition,sujet= :sujet where id = $id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $idClient=$client->getIdClient();
            $Categorie=$client->getCategorie();
            $statut=$client->getStatut();
            $dateContentieux=$client->getDateContentieux();
            $idagent=$client->getIdagent();
            $codeinterne=$client->getCodeinterne();
            $objectif=$client->getObjectif();
            $idTribual=$client->getIdTribual();
            $petition=$client->getPetition();
            $sujet=$client->getSujet();


            $req->bindValue(':idClient',$idClient);
            $req->bindValue(':Categorie',$Categorie);
            $req->bindValue(':statut',$statut);
            $req->bindValue(':dateContentieux',$dateContentieux);
            $req->bindValue(':idagent',$idagent);
            $req->bindValue(':codeinterne',$codeinterne);
            $req->bindValue(':objectif',$objectif);
            $req->bindValue(':idTribual',$idTribual);
            $req->bindValue(':petition',$petition);
            $req->bindValue(':sujet',$sujet);
            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }




    function supprimerContentieux($id){
        $sql="DELETE FROM contentieux where id= :id";
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
