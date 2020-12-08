<?php
	function bdd()
{
	try {
	 $bdd = new PDO('mysql:host=localhost; dbname=gestion', 'root', '');  //local
	$bdd->exec("SET CHARACTER SET utf8");
       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}


?>		