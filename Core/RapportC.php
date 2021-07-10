<?php

include_once "config.php";
class RapportC
{
    function ajouterrapport($client){
        $sql="insert into rapport (libelle , fichier, idcontentieux) values(:libelle , :fichier, :idcontentieux)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $libelle=$client->getLibelle();
            $fichier=$client->getFichier();
            $idcontentieux=$client->getIdcontentieux();


            $req->bindValue(':libelle',$libelle);
            $req->bindValue(':fichier',$fichier);
            $req->bindValue(':idcontentieux',$idcontentieux);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function afficherAllrapport($id){
        $sql="select * From rapport where idContentieux = $id";
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
    function getrapport($id){

        $sql="select * From rapport where id = $id";
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

    function modifierrapport($client,$id){


        $sql="UPDATE rapport SET libelle= :libelle ,fichier= :fichier where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $libelle=$client->getLibelle();
            $fichier=$client->getFichier();


            $req->bindValue(':libelle',$libelle);
            if($fichier!="")
            {$req->bindValue(':fichier',$fichier);}
            else{
                foreach ($this->getrapport($id) as $r)
                {
                    $req->bindValue(':fichier',$r['fichier']);
                }
            }



            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }




    function supprimerrapport($id){
        $sql="DELETE FROM rapport where id= :id";
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
