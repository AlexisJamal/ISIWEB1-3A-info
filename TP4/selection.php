<?php
	require 'DialogueBD.php';

	session_start();

	try {
	    $undlg = new DialogueBD();
	    $categories = $undlg->getCategories();
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
	<title>Carte du restaurant</title>
</head>
<body>
	<div class="banniere">
		<?php
			echo "Utilisateur : ".$_SESSION["login"];
		?>
		<button onclick="window.location='index.php';" class="deco"> Déconnexion </button>
	</div>

	<h1> Mon restaurant </h1>

	<table class="categories">
		<?php 
			foreach($categories as $cat)
			{
		?>
		<td> <a href="listePlats.php?categ=<?php echo $cat['codeCat']; ?>"><?php echo $cat['libelleCat']; ?> </a>(<?php $undlg->countPlats($cat['codeCat']); ?>) </td>
		<?php	
			}
		?>
	</table>
		
</body>
</html>