<?php

include_once "config.php";
class PaiementC
{
    function ajouterAjent($pai){
        $sql="insert into paiement (titre, dateth, modalite, etat, datePr,fichier,idContentieux,montant) values(:titre, :dateth, :modalite, :etat, :datePr,:fichier,:idContentieux,:montant)";
        $db = config::getConnexion();
        try{

            $req=$db->prepare($sql);
            $titre=$pai->getTitre();
            $datepr=$pai->getDatePr();
            $dateth=$pai->getDateth();
            $etat=$pai->getEtat();
            $fichier=$pai->getFichier();
            $modalite=$pai->getModalite();
            $contentieux=$pai->getIdContentieux();
            $m=$pai->getMontant();
            $req->bindValue(':titre',$titre);
            $req->bindValue(':dateth',$dateth);
            $req->bindValue(':modalite',$modalite);
            $req->bindValue(':etat',$etat);
            $req->bindValue(':datePr',$datepr);
            $req->bindValue(':fichier',$fichier);
            $req->bindValue(':idContentieux',$contentieux);
            $req->bindValue(':montant',$m);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function afficherAllPaiment($id){
        $sql="SELECT * FROM paiement  where idContentieux = $id";
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
    function recupererPaiement($id){
        $sql="SELECT * from paiement where id= $id";
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

    function updatePaiment($paiement,$id){


        $sql="UPDATE paiement SET titre= :titre,dateth= :dateth,modalite= :modalite,etat= :etat,datePr= :datePr,fichier= :fichier,idContentieux= :idContentieux,montant= :montant where id =$id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $titre=$paiement->getTitre();
            $datepr=$paiement->getDatePr();
            $dateth=$paiement->getDateth();
            $etat=$paiement->getEtat();
            $fichier=$paiement->getFichier();
            $modalite=$paiement->getModalite();
            $contentieux=$paiement->getIdContentieux();
            $m=$paiement->getMontant();



            $req->bindValue(':titre',$titre);
            $req->bindValue(':dateth',$dateth);
            $req->bindValue(':modalite',$modalite);
            $req->bindValue(':etat',$etat);
            $req->bindValue(':datePr',$datepr);
            var_dump($fichier);
            if ($fichier!=""){$req->bindValue(':fichier',$fichier);}
            else {

                    $req->bindValue(':fichier',$this->recupererPaiement($id)['fichier']);

            }
            $req->bindValue(':idContentieux',$contentieux);
            $req->bindValue(':montant',$m);





            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }

    function supprimerPaiement($id){
        $sql="DELETE FROM paiement where id= :id";
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
