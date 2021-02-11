<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Lecture de Joueur</title>
    </head>
    <body>
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
// Requette vers la base de donnee foot table poste
          $req = $bdd->query('SELECT * FROM Joueur');
          while ( $result = $req->fetch()) {
            echo $result['NomJoueur'], " ",$result['NumJoueur'];
          }
    ?>
    </body>
</html>
