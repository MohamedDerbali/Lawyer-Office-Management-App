<?php

include_once "config.php";
class tribualC
{
    function ajouterTribual($tribual){

        $sql="insert into tribual (nom,adresse,categorie,telephone,email,gouvernorat,doyen) values(:nom,:adresse,:categorie,:telephone,:email,:gouvernorat,:doyen)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$tribual->getNom();
            $addresse=$tribual->getAddresse();
            $categorie=$tribual->getCategorie();
            $tel=$tribual->getTelephone();
            $mail=$tribual->getEmail();
            $gov=$tribual->getGouvernorat();
            $doyen=$tribual->getDoyen();

            $req->bindValue(':nom',$nom);
            $req->bindValue(':adresse',$addresse);
            $req->bindValue(':categorie',$categorie);
            $req->bindValue(':telephone',$tel);
            $req->bindValue(':email',$mail);
            $req->bindValue(':gouvernorat',$gov);
            $req->bindValue(':doyen',$doyen);


            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function AllTribual(){
        $sql="select * From tribual";
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
    function AllTribualakariya(){
        $sql="select * From tribual where nom like '%عقارية%'";
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
    function AllTribualibtidaya(){
        $sql="select * From tribual where nom like '%الإبتدائية%'";
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
    function AllTribualnawahi(){
        $sql="select * From tribual where nom like '%الناحية%'";
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
    } function AllTribualistenef(){
    $sql="select * From tribual where nom like '%الإستئناف%'";
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
    function AllTribualtakib(){
        $sql="select * From tribual where nom like '%تعقيب%'";
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
    function supprimerTribual($id){
        $sql="DELETE FROM tribual where id= :id";
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

    function recupererTribual($id){
        $sql="SELECT * from tribual where id= $id";
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

    function updateTribual($tribual,$id){


        $sql="UPDATE tribual SET nom :nom,adresse :adresse,categorie :categorie,telephone :telephone,email :email,gouvernorat :gouvernorat,doyen :doyen where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$tribual->getNom();
            $addresse=$tribual->getAddresse();
            $categorie=$tribual->getCategorie();
            $tel=$tribual->getTelephone();
            $mail=$tribual->getEmail();
            $gov=$tribual->getGouvernorat();
            $doyen=$tribual->getDoyen();
            $req->bindValue(':nom',$nom);
            $req->bindValue(':adresse',$addresse);
            $req->bindValue(':categorie',$categorie);
            $req->bindValue(':telephone',$tel);
            $req->bindValue(':email',$mail);
            $req->bindValue(':gouvernorat',$gov);
            $req->bindValue(':doyen',$doyen);
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }

}
