<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Creation de compte</title>
        <link rel="stylesheet" type="text/css" href="css/compte.css">
    </head>
    <?php
    //Connection a la base de donnee
    ?>
    <?php
    			try
    			{
    				$bdd = new PDO('mysql:host=mysql-cubefoot.alwaysdata.net;dbname=cubefoot_foot;charset=utf8', 'cubefoot2021', 'projetcube2021');
    			}
    			catch(Exception $e)
    			{
            		die('Erreur : '.$e->getMessage());
    			}

          if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nom'])) {
              $req5 =$bdd->prepare('INSERT INTO Equipe (NomEquipe) VALUES (?)');
              $req5->execute(array($_POST['equipe']));
              $req6 =$bdd->query('SELECT IdEquipe FROM Equipe');
              while ( $result1 = $req6->fetch()) {
                $max = $result1['IdEquipe'];
              }
              $req4 =$bdd->prepare('INSERT INTO Uttilisateur (NomUttilisateur, Username,DateCreation, PasswordUser, IdEquipe) VALUES (?,?,?,?,?)');
              $req4->execute(array($_POST['nom'], $_POST['username'],date("Y/m/d"),$_POST['password'],$max));
              header('Location: http://cubefoot.alwaysdata.net/connexion.php');
          }
// Requette vers la base de donnee foot table poste
          $req = $bdd->query('SELECT * FROM Poste');
    ?>
    <body>

      <h1> Création de votre compte </h1>
<?php //Creation d'un formulaire ?>


<div class="maincontainer">

<div class="thecard">

<div class="thefront"><h2>Inscription</h2></div> <!-- Première Face -->

<div class="theback">

      <form class="create" action="CreationCompte.php" method="post">
        <p><label for="nom">Identité  </label><input type="text" name="nom" value="" /></p>
        <p><label for="username">Username  </label><input type="text" name="username" value="" /></p>
        <p><label for="password">Password  </label><input type="password" name="password" value="" /></p>
        <?php //Boucle d'acces a la table poste pour liste deroulante dynamique ?>
<div class="bloc">
<p><label for="equipe">Votre Equipe  </label><input type="text" name="equipe" value="" /></p>
</div>
<p><input class="envoi" type="submit" value="Envoyer" /></p>
</form>


</div> <!-- Fermeture de la seconde face -->

</div> <!-- Fermeture de la carte -->

</div> <!-- Fermeture du container contenant la carte -->


    	</body>
</html>
