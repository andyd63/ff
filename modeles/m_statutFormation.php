<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allStatutFormation(){
	$req =  new myQueryClass('statutFormation');
	$r = $req->myQuerySelect();
	return $r;
}

//Retourne juste le statut du produit
function statutFormation($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idStatutFormation','type'=>'=','name'=>'idStatutFormation','value'=>$id));
	$req =  new myQueryClass('statutFormation',$conditions);
	$r = $req->myQuerySelect();
	return $r[0]['nomStatut'];
}

