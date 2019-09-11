<?php 
	require 'DialogueBD.php';

	session_start();
	try {
	    $undlg = new DialogueBD();
	    $rdv = $undlg->getCreneau($_GET['item'])[0];
	} 
    catch (Exception $e) {
    	$erreur = $e->getMessage();
    }

?>


<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="design.css">
	<title>Modifier rendez-vous</title>
</head>
<body>

	<div class="banniere">
		<?php
			echo "Utilisateur : ".$_SESSION["login"];
		?>
		<button onclick="window.location='index.php';" class="deco"> Déconnexion </button>
		<button onclick="window.location='creneaux.php';" class="deco"> Retour </button>
	</div>

	<form action="creneaux.php?cmd=update&item=<?php echo $rdv['id']; ?>" method="post">
		<h1> Modifier le rendez-vous </h1>
	<p />
	<input type="datetime-local" name="debut" size="20" placeholder="Horaire de début" value="<?php echo $rdv['debut']; ?>" />
	<p />
	<input type="number" name="duree" size="20" placeholder="Durée" value="<?php echo $rdv['duree']; ?>" />
	<p />
	<tr>
		<td> Créneau exclusif </td>
		<td><input type="radio" name="exclu" value="true" <?php if ($rdv['duree']) { ?> checked <?php } ?> > Oui</td>
		<td><input type="radio" name="exclu" value="false" <?php if (!$rdv['duree']) { ?> checked <?php } ?> > Non </td>
	</tr>
	<p />
	<input type="datetime-local" name="publi" size="20" placeholder="Horaire de publication" value="<?php echo $rdv['publi']; ?>" />
	<p />
	<input type="number" name="idProf" size="20" placeholder="Identifiant professeur" value="<?php echo $rdv['idProf']; ?>" />
	<p />
	<select name="indicateur" size="1">
		<OPTION <?php if ($rdv['indicateur'] == 'Libre') { ?> checked <?php } ?> >Libre
		<OPTION <?php if ($rdv['indicateur'] == 'Occupé') { ?> checked <?php } ?> >Occupé
		<OPTION <?php if ($rdv['indicateur'] == 'Soutenu') { ?> checked <?php } ?> >Soutenu
	</select>
	<p />
	<input type="number" name="note" size="20" placeholder="Note" value="<?php echo $rdv['note']; ?>" />
	<p />
	<input type="text" name="commentaireAvant" size="50" placeholder="Commentaire d'avant soutenance" value="<?php echo $rdv['commentaireAvant']; ?>" />
	<p />
	<input type="text" name="commentaireApres" size="50" placeholder="Commentaire de soutenance" value="<?php echo $rdv['commentaireApres']; ?>" />
	<p />
	<input type="submit" value="Valider" />
	</form>
</body>
</html>