<?php

include_once "config.php";
class ChargeC
{
    function ajouterCharget($c){
        $sql="insert into charge (montant,etat, datecharge,fichier,idContentieux) values(:montant,:etat, :datecharge,:fichier,:idContentieux)";
        $db = config::getConnexion();
        try{

            $req=$db->prepare($sql);
            $montant=$c->getMontant();
            $etat=$c->getEtat();
            $datecharge=$c->getDatecharge();
            $fichier=$c->getFichier();
            $contentieux=$c->getIdContentieux();

            $req->bindValue(':montant',$montant);
            $req->bindValue(':etat',$etat);
            $req->bindValue(':datecharge',$datecharge);
            $req->bindValue(':fichier',$fichier);
            $req->bindValue(':idContentieux',$contentieux);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }
    function afficherAllCharges($id){
        $sql="SELECT * FROM charge  where idContentieux = $id";
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
    function recupererCharge($id){
        $sql="SELECT * from charge where id= $id";
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

    function updateCharge($c,$id){


        $sql="UPDATE charge SET montant= :montant,etat= :etat,datecharge= :datecharge,fichier= :fichier where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $montant=$c->getMontant();
            $etat=$c->getEtat();
            $datecharge=$c->getDatecharge();
            $fichier=$c->getFichier();


            $req->bindValue(':montant',$montant);
            $req->bindValue(':etat',$etat);
            $req->bindValue(':datecharge',$datecharge);

            if($fichier!="")
            {
                $req->bindValue(':fichier',$fichier);
            }
            else
            {

                    $req->bindValue(':fichier',$this->recupererCharge($id)['fichier']);


            }







            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }

    function supprimerCharge($id){
        $sql="DELETE FROM charge where id= :id";
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
