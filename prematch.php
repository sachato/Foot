<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/prematch.css">
        <title>Creation de match</title>
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
          if (empty($_POST['Advairsaire']) || empty($_POST['ArbitreP']) || empty($_POST['ArbitreA1']) || empty($_POST['ArbitreA2'])  || empty($_POST['Lieu']) ||  empty($_POST['Date'])){
            echo " ";
          }
          else{
            $req5 =$bdd->prepare('INSERT INTO Rencontre (LieuxMatch, DateMatch, IdPeriode) VALUES (?,?,?)');
            $req5->execute(array($_POST['Lieu'], $_POST['Date'], 1 ));

            $req6 =$bdd->query('SELECT IdMatch FROM Rencontre');
            while ( $result1 = $req6->fetch()) {
              $max = $result1['IdMatch'];
            }
            echo $max;
            $req7 =$bdd->prepare('INSERT INTO Arbitrer (IdArbitre, Role_arbitre, IdMatch) VALUES (?,?,?)');
            $req7->execute(array($_POST['ArbitreP'], "Principal", $max));
            $req8 =$bdd->prepare('INSERT INTO Arbitrer (IdArbitre, Role_arbitre,IdMatch) VALUES (?,?,?)');
            $req8->execute(array($_POST['ArbitreA1'], "Assistant1", $max));
            $req9 =$bdd->prepare('INSERT INTO Arbitrer (IdArbitre,Role_arbitre, IdMatch) VALUES (?,?,?)');
            $req9->execute(array($_POST['ArbitreA2'], "Assistant2", $max));

            $req10 =$bdd->prepare('INSERT INTO Joue (IdMatch, IdEquipe) VALUES (?,?)');
            $req10->execute(array($max, $_SESSION['IdEquipe']));
            $req11 =$bdd->prepare('INSERT INTO Joue (IdMatch, IdEquipe) VALUES (?,?)');
            $req11->execute(array($max, $_POST['Advairsaire']));

            header('Location: http://cubefoot.alwaysdata.net/compoequipe.php');
          }
    ?>
    <body>

      <h1> Préparation de votre prochain match </h1>
<?php //Creation d'un formulaire
$req1 = $bdd->query('SELECT * FROM Equipe');
$req2 = $bdd->query('SELECT * FROM Arbitre');
$req3 = $bdd->query('SELECT * FROM Arbitre');
$req4 = $bdd->query('SELECT * FROM Arbitre'); ?>
<form action="prematch.php" method="post">

<div class="rubrique">
<label for="Equipe adverse">Equipe adverse  </label>
<select name="Advairsaire">
<?php
      while ( $result = $req1->fetch()) {
        if ($result['IdEquipe'] == $_SESSION['IdEquipe']){
          echo ' ';
        }
       else{
        ?>
          <option value="<?php echo $result['IdEquipe'] ?>"><?php echo $result['NomEquipe'] ?></option>
 <?php }} ?>
</select>
</div>
<br>

<div class="rubrique">
<label for="ArbitreP">Arbitre principal  </label><select name="ArbitreP">
<?php
      while ( $result = $req2->fetch()) {
        ?>
   <option value="<?php echo $result['IdArbitre']?>"><?php echo $result['NomArbitre'] ?></option>
 <?php } ?>
</select>
</div>

<br>
<div class="rubrique">
<label for="ArbitreA1">Arbitre Assistant 1 </label><select name="ArbitreA1">
<?php
      while ( $result2 = $req3->fetch()) {
        ?>
   <option value="<?php echo $result2['IdArbitre'] ?>"><?php echo $result2['NomArbitre'] ?></option>
 <?php } ?>
</select>
</div>

<br>
<div class="rubrique">
<label for="ArbitreA2">Arbitre Assistant 2 </label><select name="ArbitreA2">
<?php
      while ( $result3 = $req4->fetch()) {
        ?>
   <option value="<?php echo $result3['IdArbitre'] ?>"><?php echo $result3['NomArbitre'] ?></option>
 <?php } ?>
</select>
</div>

<br>
<div class="rubrique">
<label for="Lieu">Lieu </label><input type="text" name="Lieu" value="" />
</div>
<br>

<div class="rubrique">
<label for="Date">Date </label><input type="date" name="Date" value="" />
</div>
<br>
<p><input class="btn" type="submit" value="Composition de l'equipe" /></p>
</form>

    	</body>
</html>
