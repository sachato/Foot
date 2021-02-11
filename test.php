<?php

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=Foot;charset=utf8', 'sacha', 'sacha');
  }
  catch(Exception $e)
  {
        die('Erreur : '.$e->getMessage());
  }
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['password'])) {
  //Cryptage du mot de passe
  $pass_hach = password_hash($_POST['password'],PASSWORD_DEFAULT);
  //insertion des donnes dans la table uttilisateur
  $req =$bdd->prepare('INSERT INTO uttilisateur(prenom, nom, username, password, mail) VALUES (:prenom, :nom, :username, :pass, :mail)');
  $req->execute(array(
    'prenom' => $_POST['prenom'],
    'nom' => $_POST['nom'],
    'username' => $_POST['username'],
    'pass' => $pass_hach,
    'mail' => $_POST['mail']
  ));
  echo $_POST['prenom'],' ',$_POST['nom'],' ',$_POST['username'],' ',$pass_hach,' ',$_POST['mail'];
//    echo $_POST['prenom'],$_POST['nom'],$_POST['username'],$pass_hach,$_POST['mail'];
//$sql=$bdd->query("INSERT INTO 'uttilisateur' ('prenom', 'nom', 'username', 'password', 'mail') VALUES($_POST['prenom'],$_POST['nom'],$_POST['username'],$pass_hach,$_POST['mail'])");
}

?>
