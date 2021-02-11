<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin</title>
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
			?>
      <h1> Create </h1>
      <form method="post" action="CreateJoueur.php"
      <select name="create">
	       <option>Joueur</option>
        </select>
	  	<input class ="create" type="submit" value="Create"/>
    </form>
    <hr>

  <h1> Read </h1>
  <form method="post" action="ReadJoueur.php"
  <select name="read">
     <option>Joueur</option>
    </select>
  <input class ="Read" type="submit" value="Read"/>
</form>
<hr>
<h1> Update </h1>
<form method="post" action="UpdateJoueur.php"
<select name="update">
   <option>Joueur</option>
  </select>
<input class ="Update" type="submit" value="Update"/>
</form>
<hr>
<h1> Delete </h1>
<form method="post" action="DeleteJoueur.php"
<select name="delete">
   <option>Joueur</option>
  </select>
<input class ="Delete" type="submit" value="Delete"/>
</form>
<hr>
    	</body>
</html>
