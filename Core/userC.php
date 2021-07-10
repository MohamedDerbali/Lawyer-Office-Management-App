<?PHP
include_once "config.php";

class userC {


  function inscription($categorie){
    $sql="insert into Agent (nom, prenom, mail, password, adresse) values(:nom,:prenom, :mail, :password, :adresse)";
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
  function modifierAgent($categorie,$id){
    $sql="UPDATE Agent SET nom = :nom where id = :id";
    $db = config::getConnexion();
    try{
      $req=$db->prepare($sql);
      $nom=$categorie->getNom();
      $req->bindValue(':nom',$nom);
      $req->bindValue(':id',$id);
      $s=$req->execute();

    }
    catch (Exception $e){
      echo " Erreur ! ".$e->getMessage();
    }

  }
  function Login($email,$password){
    $sql="Select * from user where mail = :email and password = :password";

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
}
?>
