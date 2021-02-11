<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Connexion </title>
        <link rel="stylesheet" type="text/css" href="css/connect.css">
    </head>
    <body>
		<?php

			try
			{
				$bdd = new PDO('mysql:host=mysql-cubefoot.alwaysdata.net;dbname=cubefoot_foot;charset=utf8', 'cubefoot2021', 'projetcube2021');
			}
			catch(Exception $e)
			{
        		die('Erreur : '.$e->getMessage());
			}
		if (empty($_POST['username']) || empty($_POST['password'])) {
			echo "Connection refusee champs vide";
		}
    else {
      $req =$bdd->prepare('SELECT IdUttilisateur, NomUttilisateur, Username, PasswordUser, IdEquipe FROM Uttilisateur WHERE Username = ?');
      $req->execute(array($_POST['username']));
      $result = $req->fetch();
      if ($_POST['password'] != $result['PasswordUser']) {
        echo "Connection refusee password";
      }
      else {
        echo "Connection accept";
        session_start();
    		$_SESSION['username'] = $result['Username'];
    		$_SESSION['nom'] = $result['NomUttilisateur'];
    		$_SESSION['IdEquipe'] = $result['IdEquipe'];
    		$_SESSION['IdUttilisateur'] = $result['IdUttilisateur'];
    		echo 'Vous etes connecté!';
    		echo '<br/>';
    		echo $_SESSION['username'];
    		echo '<br/>';
    		echo $_SESSION['nom'];
    		echo '<br/>';
    		echo $_SESSION['IdEquipe'];
    		echo '<br/>';
    		echo $_SESSION['IdUttilisateur'];
    		echo 'Redirection en cour';
    		header('Location: http://cubefoot.alwaysdata.net/tableauDeBord.php');
      }
    }
		?>

    <h4>Connexion</h4>
		<form method="post" action="connexion.php">

		<div class="espace">
		<label for="username">Votre pseudo : </label> <br> <input type="text" name="username" value=""/>
		</div>

		<div class="espace">
		<label class="space" for="password">Mot de passe :</label>  <br> <input type="password" name="password" value=""  />
		<br/>
		<br/>
		</div>

		<input class ="mybutton" type="submit" value="Valider"/>

		</form>

	</body>
</html>
