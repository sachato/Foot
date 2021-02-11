<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Creation de Joueur</title>
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
// Requette vers la base de donnee foot table poste
          $req = $bdd->query('SELECT * FROM Poste');
    ?>
    <body>

      <h1> Création de joueur </h1>
<?php //Creation d'un formulaire ?>

      <form action="traitement.php" method="post">
        <p><label for="nom">Nom et Prénom </label><input type="text" name="nom" value="" /></p>
        <?php //Boucle d'acces a la table poste pour liste deroulante dynamique ?>
<p>
<label for="Poste">Quel est le poste du joueur </label><select name="poste">
  <?php
        while ( $result = $req->fetch()) {
          ?>
     <option value="<?php echo $result['IdPoste'] ?>"><?php echo $result['NomPoste'] ?></option>
   <?php } ?>
</select></p>

<?php //Liste selection place ?>
<p>
<label for="place">Ou est-il placé</label>
<select name="place">
	<option>Gauche</option>
	<option>Centre</option>
	<option>Droite</option>
</select>
</p>

<?php //Numero du joueur ?>
<p>
<label for="NumJoueur">Numero: </label><input type="number" min="0" max="44" name="NumJoueur">
</p>
<?php //Actif ?>
<p>
<label for="Actif">Dans l'equipe? </label><input type="number" min="0" max="1" name="Actif">
</p>
<?php //Capitaine ?>
<p>
<label for="Capitaine">Est-il capitaine: </label><input type="number" min="0" max="1" name="Capitaine">
</p>
<?php //Supleant ?>
<p>
<label for="Supleant">Est-il supleant: </label><input type="number" min="0" max="1" name="Supleant">
</p>
<?php //Titulaire ?>
<p>
<label for="Titulaire">Est-il Titulaire: </label><input type="number" min="0" max="1" name="Titulaire">
</p>
<?php //Poste de prediliction ?>
<p>
<label for="prediliction">Quel est le poste de prediliction du joueur </label><select name="prediliction">
  <?php
  $req3 = $bdd->query('SELECT * FROM Poste');
        while ( $result = $req3->fetch()) {
          ?>
     <option value="<?php echo $result['IdPoste'] ?>"><?php echo $result['NomPoste'] ?></option>
   <?php } ?>
</select></p>

<?php //Equipe
$req2 = $bdd->query('SELECT * FROM Equipe');
?>
<p>
<select name="poste">
  <?php
        while ( $result = $req2->fetch()) {
          ?>
     <option value="<?php echo $result['IdEquipe'] ?>"><?php echo $result['NomEquipe'] ?></option>
   <?php } ?>
</select></p>
<?php //Boutton de submition ?>
<p><input type="submit" value="Envoyer" /></p>
</form>
    	</body>
</html>
