<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Creation de votre compte </title>
    </head>
    <body>
		<?php
			echo '<h1>Binvenue, '. $_SESSION['username'].'</h1>';
			echo '<br/>';
		?>
		<hr/>
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
          <h1> Preparation du match </h1>
          <form method="post" action="prematch.php">
    	  	<input class ="button" type="submit" value="Create"/>
        </form>
	</body>
</html>
