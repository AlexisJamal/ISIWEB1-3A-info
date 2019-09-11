<?php
	require 'DialogueBD.php';

	session_start();

	$cmd = @$_POST['cmd'];
	$cmd = filter_input(INPUT_GET, 'cmd');
	if (is_null($cmd)) {
		$cmd = filter_input(INPUT_POST, 'cmd');
	}

	try {
	    $undlg = new DialogueBD();
	    $cren = $undlg->getCreneaux();
	    if ($cmd == 'delete') {
    		$undlg->deleteCreneau($_GET['item']);
    		header('Location: creneaux.php');
    	}
    	else if ($cmd == 'add') {
    		$undlg->createCreneau($_POST['id'], $_POST['debut'], $_POST['duree'], $_POST['exclu'], $_POST['publi'], $_POST['idProf'], $_POST['indicateur'], $_POST['note'], $_POST['commentaireAvant'], $_POST['commentaireApres']);
    		header('Location: creneaux.php');
    	}
    	else if ($cmd == 'update') {
    		$undlg->updateCreneau($_GET['item'], $_POST['debut'], $_POST['duree'], $_POST['exclu'], $_POST['publi'], $_POST['idProf'], $_POST['indicateur'], $_POST['note'], $_POST['commentaireAvant'], $_POST['commentaireApres']);
    		header('Location: creneaux.php');
    	}
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
	<title>Gestionnaire de rendez-vous</title>
</head>
<body>

	<div class="banniere">
		<?php
			echo "Utilisateur : ".$_SESSION["login"];
		?>
		<button onclick="window.location='index.php';" class="deco"> Déconnexion </button>
	</div>

	<div class="title">
		<h1> Mes rendez-vous </h1>
		<button onclick="window.location='formRdv.php';"> Nouveau rendez-vous </button>
	</div>

	<table class="creneaux" >
		<?php
		if (!$cren) { 
		?>
			<tr>
				<td>Aucun rendez-vous pour le moment</td>
			</tr>
		<?php
		} else {
		?>
			<th>
				<td> Horaire de début </td>
				<td> Durée </td>
				<td> Exclusif </td>
				<td> Horaire de publication </td>
				<td> Identifiant du professeur </td>
				<td> Indicateur de soutenance </td>
				<td> Note </td>
				<td> Commentaire d'avant soutenance </td>
				<td> Commentaire de soutenance </td>
			</th>
		<?php
			foreach($cren as $aCren) {
		?>		
			<tr>
				<td class="noBorder">
					<?php echo $aCren['id'] ?>
				</td>
				<td>
					<?php echo $aCren['debut'] ?>
				</td>
				<td>
					<?php echo $aCren['duree'] ?>
				</td>
				<td>
					<?php 
					if ($aCren['exclu']) { 
						echo "Oui";
					}
					else {
						echo "Non";
					}
					?>
				</td>
				<td>
					<?php echo $aCren['publi'] ?>
				</td>
				<td>
					<?php echo $aCren['idProf'] ?>
				</td>
				<td>
					<?php echo $aCren['indicateur'] ?>
				</td>
				<td>
					<?php echo $aCren['note'] ?>
				</td>
				<td>
					<?php echo $aCren['commentaireAvant'] ?>
				</td>
				<td>
					<?php echo $aCren['commentaireApres'] ?>
				</td>
				<td class="noBorder">
					<a href="updateRdv.php?item=<?php echo $aCren['id'] ?>">Éditer</a>
				</td>
				<td class="noBorder">
					<a href="creneaux.php?cmd=delete&item=<?php echo $aCren['id'] ?>">Supprimer</a>
				</td>
			</tr>
		<?php
			}
		}
		?>
		</table>
</body>
</html>