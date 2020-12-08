<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allStatutProduit(){
	$req =  new myQueryClass('statutProduit');
	$r = $req->myQuerySelect();
	return $r;
}

//Retourne juste le statut du produit
function statutProduit($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idStatutProduit','type'=>'=','name'=>'idStatutProduit','value'=>$id));
	$req =  new myQueryClass('statutProduit',$conditions);
	$r = $req->myQuerySelect();
	return $r[0]['nomStatut'];
}

