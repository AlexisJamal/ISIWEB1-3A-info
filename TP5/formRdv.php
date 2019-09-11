<?php 

	session_start();

?>


<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="design.css">
	<title>Nouveau rendez-vous</title>
</head>
<body>

	<div class="banniere">
		<?php
			echo "Utilisateur : ".$_SESSION["login"];
		?>
		<button onclick="window.location='index.php';" class="deco"> Déconnexion </button>
		<button onclick="window.location='creneaux.php';" class="deco"> Retour </button>
	</div>

	<form action="creneaux.php?cmd=add" method="post">
		<h1> Nouveau rendez-vous </h1>
	<p />
	<input type="number" name="id" size="20" placeholder="Identifiant" />
	<p />
	<input type="datetime-local" name="debut" size="20" placeholder="Horaire de début" />
	<p />
	<input type="number" name="duree" size="20" placeholder="Durée" />
	<p />
	<tr>
		<td> Créneau exclusif </td>
		<td><input type="radio" name="exclu" value="true" checked> Oui</td>
		<td><input type="radio" name="exclu" value="false" > Non </td>
	</tr>
	<p />
	<input type="datetime-local" name="publi" size="20" placeholder="Horaire de publication" />
	<p />
	<input type="number" name="idProf" size="20" placeholder="Identifiant professeur" />
	<p />
	<select name="indicateur" size="1">
		<OPTION>Libre
		<OPTION>Occupé
		<OPTION>Soutenu
	</select>
	<p />
	<input type="number" name="note" size="20" placeholder="Note" />
	<p />
	<input type="text" name="commentaireAvant" size="50" placeholder="Commentaire d'avant soutenance" />
	<p />
	<input type="text" name="commentaireApres" size="50" placeholder="Commentaire de soutenance" />
	<p />
	<input type="submit" value="Valider" />
	</form>
</body>
</html>