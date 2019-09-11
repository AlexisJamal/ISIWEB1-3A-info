<?php
	require_once 'DialogueBD.php';

	session_start();

	try {
	    $undlg = new DialogueBD();
	    $plats = $undlg->getPlats($_GET['categ']);
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
	<title>Plats</title>
</head>
<body>
	<div class="banniere">
		<?php
			echo "Utilisateur : ".$_SESSION["login"];
		?>
		<button onclick="window.location='index.php';" class="deco"> Déconnexion </button>
		<button onclick="window.location='selection.php';" class="deco"> Retour </button>
	</div>

	<table class="plats">
		<?php 
			foreach($plats as $p)
			{
		?>
		<td> 
			<tr><h1> <?php echo $p['nomPlat'] ?> </h1></tr>
			<tr> <img src="img/<?php echo $p['nomImg']?>" alt="<?php echo $p['nomPlat'] ?>" ></tr>
			<tr><h2> <?php echo $p['prix'] ?>€</h2></tr>
			<?php if (isset($p['hitParade'])) { ?>
			<tr> <p> Classement hit parade : <?php echo $p['hitParade'] ?></p></tr>
			<?php } ?>
		</td>
		<?php	
			}
		?>
	</table>
		
</body>
</html>
