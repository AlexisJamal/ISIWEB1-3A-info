<?php 
	require_once 'DialogueBD.php';

	session_start();
	$_SESSION = array();
	session_destroy();

	if (isset($_POST["login"]) && isset($_POST["pwd"])){
	    try {
		    $undlg = new DialogueBD();
		    $user = $undlg->getUser($_POST["login"],$_POST["pwd"]);
		    if ($user){
		        session_start();
		        $_SESSION["login"] = $_POST["login"];
		        header('Location: selection.php');
		    }
	    } 
	    catch (Exception $e) {
	    	$erreur = $e->getMessage();
	    }
	}
?>


<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="design.css">
	<title>Connexion</title>
</head>
<body>
	<form action="index.php" method="post"> 
		Identifiez-vous
	<p />
	<input type="text" name="login" size="20" placeholder="Identifiant" />
	<p />
	<input type="password" name="pwd" size="20" placeholder="Mot de passe" />
	<p />
	<input type="submit" value="Connexion" />
	</form>
</body>
</html>