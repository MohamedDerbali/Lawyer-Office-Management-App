<?php
include_once "config.php";


class JugementCalendarC
{


    function addjugementcalendar($jugementcalendar){
        $sql="insert into jugementcalendar (title, start, jugementcalendar.end, backgroundColor,idavocat,rappelPersonalise,tpe) values(:title, :start, :endd, :backgroundColor, :idAvc,:rappelPersonalise,:tpe)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':title',$jugementcalendar->getTitle());
            $req->bindValue(':start',$jugementcalendar->getStart());
            $req->bindValue(':endd',$jugementcalendar->getEnd());
            $req->bindValue(':backgroundColor',$jugementcalendar->getBackgroundColor());
            $req->bindValue(':tpe',$jugementcalendar->getTpe());
            $req->bindValue(':idAvc',$jugementcalendar->getIdavocat());
            $req->bindValue(':rappelPersonalise',$jugementcalendar->getRappelPersonalise());
            $req->execute();
            return $db->lastInsertId();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function addjugementcalendarRendezvous($jugementcalendar){
        $sql="insert into jugementcalendar (title, start, jugementcalendar.end, backgroundColor,idavocat,tpe,ClientRendezvous) values(:title, :start, :endd, :backgroundColor, :idAvc,:tpe,:ClientRendezvous)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':title',$jugementcalendar->getTitle());
            $req->bindValue(':start',$jugementcalendar->getStart());
            $req->bindValue(':endd',$jugementcalendar->getEnd());
            $req->bindValue(':backgroundColor',$jugementcalendar->getBackgroundColor());
            $req->bindValue(':tpe',$jugementcalendar->getTpe());
            $req->bindValue(':idAvc',$jugementcalendar->getIdavocat());
            $req->bindValue(':ClientRendezvous',$jugementcalendar->getClientRendezvous());
            $req->execute();
            return $db->lastInsertId();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }
    function addjugementcalendarjalasa($jugementcalendar){
        $sql="insert into jugementcalendar (title, start, jugementcalendar.end, backgroundColor, idavocat,cotentieu,Adversaire,tpe,tribunal) values(:title, :start, :endd, :backgroundColor, :idAvc,:adreallDaysse,:Adversaire,:tpe,:tribunal)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':title',$jugementcalendar->getTitle());
            $req->bindValue(':start',$jugementcalendar->getStart());
            $req->bindValue(':endd',$jugementcalendar->getEnd());
            $req->bindValue(':backgroundColor',$jugementcalendar->getBackgroundColor());
            $req->bindValue(':adreallDaysse',$jugementcalendar->getIdcotentieux());
            $req->bindValue(':Adversaire',$jugementcalendar->getAdversaire());
            $req->bindValue(':tpe',$jugementcalendar->getTpe());
            $req->bindValue(':idAvc',$jugementcalendar->getIdavocat());
            $req->bindValue(':tribunal',$jugementcalendar->getTribunal());
            $req->execute();
            return $db->lastInsertId();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function Alljugementcalendar($id){
        $sql="select * From jugementcalendar where idavocat=$id";
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
    function supprimerjugementcalendar($id){
        $sql="DELETE FROM jugementcalendar where id= :id";
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
    function modifierjugementcalendar($enddate,$id){
        $sql="UPDATE jugementcalendar SET jugementcalendar.end = :nom where id = :id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':nom',$enddate);
            $req->bindValue(':id',$id);
            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }
    function Dropjugementcalendar($startdate,$enddate,$id){
        $sql="UPDATE jugementcalendar SET jugementcalendar.end = :nom , jugementcalendar.start=:prenom where id = :id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':nom',$enddate);
            $req->bindValue(':prenom',$startdate);
            $req->bindValue(':id',$id);
            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }
    function recupererjugementcalendar($id){
        $sql="SELECT * from jugementcalendar where id= $id";
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
    function cnte($id,$x){
        $sql="SELECT count(*) from jugementcalendar where tpe= :tpe and idavocat=:l";
        $db = config::getConnexion();
        try{
            $sth = $db->prepare($sql);
            $sth->bindValue(':tpe',$id);
            $sth->bindValue(':l',$x);
            $sth->execute();
            $liste = $sth->fetch();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function getfulldetailsjugementcalendar($id){
        $sql="SELECT * from jugementcalendar jc join contentieux c on c.id=jc.cotentieu join agent a on a.id=jc.idAgent where jc.id= $id";
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
    function mettreajours($startdate,$enddate,$id){
        $sql="UPDATE jugementcalendar SET jugementcalendar.start = :start, jugementcalendar.end = :x where id = :id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':start',$startdate);
            $req->bindValue(':x',$enddate);
            $req->bindValue(':id',$id);
            $s=$req->execute();

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }

    }
    function getfulldetailsjugementcalendarByavocat($id){
        $sql="SELECT * from jugementcalendar jc join contentieux c on c.id=jc.cotentieu where jc.id= $id";
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
}