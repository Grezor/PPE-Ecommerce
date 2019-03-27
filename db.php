<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe1719', "root", ""); 
		$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
	}
	catch(PDOException $e)
	{
		echo "Impossible de se connecter";
		die(); 
	}
?>
