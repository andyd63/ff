<?php
	 /*
	  * sCRIPT TO IMPORT CSV FILE INTO DATABASE TABLE 
	 */

	require "../modeles/m_bdd.php"; // ajoute le modèle bdd
	require_once ('../assets/inc/function.php');
	require_once ('../classes/myQuery.php');

	$nomTable = $_POST['nomTable']; // Nom de la table
	$csvFileToLoad = $_FILES['fichier']['tmp_name']; //nom du csv
	$isSavingToDB = false;

	function insertTable($nomTable,$entete,$data){

		$cpt = 0;
		$conditions = array();
		foreach($data as $d){
			$entete[$cpt] = str_replace('﻿', '', $entete[$cpt]);
			array_push($conditions, array('nameChamps'=>$entete[$cpt],'name'=>$entete[$cpt],'value'=>$d));	
			$cpt++;
		}
		$req =  new myQueryClass($nomTable,$conditions);
		$r = $req->myQueryInsert();
	}

	$compteurLigne = 0;
	$entete = '';
	if($csvFileToLoad != ''){ // si le fichier a un nom
		if(($readCSVFile = fopen("{$csvFileToLoad}", "r")) != false) {
		while(!feof($readCSVFile) && ($data = fgetcsv($readCSVFile)) !== false) { // pour chaque ligne
	      	try {
				if($compteurLigne == 0){ //entete
					$entete = $data;
				}else{
				insertTable($nomTable,$entete,$data);
				}
				$compteurLigne++;
				$isSavingToDB = true;
	      	} catch (PDOException $e) {
	      		die("Error: " . $e->getMessage());
	      	}
	    }

	    fclose($readCSVFile);

			//check file imported
			if($isSavingToDB) {
				redirectUrl('../index.php?c=admin&action=ajoutdonnee&s=success');
			}else{
				redirectUrl('../index.php?c=admin&action=ajoutdonnee&s=false');
			}
		}else{
			redirectUrl('../index.php?c=admin&action=ajoutdonnee&s=false');
		}
	}else{
		redirectUrl('../index.php?c=admin&action=ajoutdonnee&s=false');
	}


