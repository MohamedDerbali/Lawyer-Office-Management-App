<?php
include_once "config.php";

class historiquecalendarC
{

    function ADDhistory($jugementcalendar){
        $sql="insert into historiquecalendar (idcalendar, idagent, idav, descriptionModif) values(:idcalendar, :idagent, :idav, :descriptionModif)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);





            $req->bindValue(':idcalendar',$jugementcalendar->getIdcalendar());
            $req->bindValue(':idagent',$jugementcalendar->getIdagent());
            $req->bindValue(':idav',$jugementcalendar->getIdavocat());
            $req->bindValue(':descriptionModif',$jugementcalendar->getDescriptionModif());

            $req->execute();
            return $db->lastInsertId();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }
    function gethistoryByid($id){
        $sql="SELECT * from historiquecalendar ct INNER JOIN agent c ON ct.idagent = c.id where ct.idcalendar= $id ";
        $db = config::getConnexion();
        try{
            $sth = $db->prepare($sql);
            $sth->execute();
            return $sth->fetchAll();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}