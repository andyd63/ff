<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allMateriel(){
	$req =  new myQueryClass('materiel');
	$r = $req->myQuerySelect();
	return $r;
}

//Retourne juste le nom du matériel
function nomMateriel($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idMateriel','type'=>'=','name'=>'idMateriel','value'=>$id));
	$req =  new myQueryClass('materiel',$conditions);
	$r = $req->myQuerySelect();
	return $r[0]['nomMateriel'];
}

