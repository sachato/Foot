<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Creation de votre compte </title>
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
		if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['password'])) {
			//Cryptage du mot de passe
			$pass_hach = password_hash($_POST['password'],PASSWORD_DEFAULT);
			//insertion des donnes dans la table uttilisateur
			$req =$bdd->prepare('INSERT INTO uttilisateur (prenom, nom, username, password, mail) VALUES (?, ?, ?, ?, ?)');
			$req->execute(array($_POST['prenom'],$_POST['nom'],$_POST['username'],$pass_hach,$_POST['mail']));
  //    echo $_POST['prenom'],$_POST['nom'],$_POST['username'],$pass_hach,$_POST['mail'];
    //$sql=$bdd->query("INSERT INTO 'uttilisateur' ('prenom', 'nom', 'username', 'password', 'mail') VALUES($_POST['prenom'],$_POST['nom'],$_POST['username'],$pass_hach,$_POST['mail'])");
		}

		?>

		<form method="post" action="createUttilisateur.php">
		<h4>Creation de votre compte</h4>
		<p>
		<label for="nom">Nom </label> : <input type="text" name="nom" />
		<br/>
		<label for="prenom">Prenom </label> : <input type="text" name="prenom" />
		<br/>
		<label for="username">Votre nom dans l application </label> : <input type="text" name="username" />
		<br/>
		<label for="mail">Email</label> : <input type="text" name="mail"  />
		<br/>
		<label for="password">Mot de passe</label> : <input type="password" name="password"  />
		<br/>
		<br/>
		<input class ="myButton" type="submit" value="Valider"/>
	</p>
		</form>

		<form method="post" action="connexion.php">
		<h4>vers connexion</h4>
		<input class ="myButton" type="submit" value="Connexion"/>
	</p>
		</form>




	</body>
</html>
