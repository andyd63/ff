<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allFormation(){
	$req =  new myQueryClass('formation');
	$r = $req->myQuerySelect();
	return $r;
}

//Retourne juste le nom de la formation
function nomFormation($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idFormation','type'=>'=','name'=>'idFormation','value'=>$id));
	$req =  new myQueryClass('formation',$conditions);
	$r = $req->myQuerySelect();
	return $r[0]['nomFormation'];
}

//Retourne juste le nom de la formation
function maFormation($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idFormation','type'=>'=','name'=>'idFormation','value'=>$id));
	$req =  new myQueryClass('formation',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}



//Retourne juste le nom de la formation
function mesFormations($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'demandeur','type'=>'=','name'=>'demandeur','value'=>$id));
	$req =  new myQueryClass('formation',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}



//Retourne juste le nom de la formation
function formationNonTraite(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idStatutFormation','type'=>'=','name'=>'idStatutFormation','value'=>'0'));
	$req =  new myQueryClass('formation',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}

//Retourne juste le nom de la formation
function formationEnPreparation(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idStatutFormation','type'=>'=','name'=>'idStatutFormation','value'=>'1'));
	$req =  new myQueryClass('formation',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}

//Retourne juste le nom de la formation
function formationEnValise(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idStatutFormation','type'=>'=','name'=>'idStatutFormation','value'=>'2'));
	$req =  new myQueryClass('formation',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}

// ajoute une formation, statut de base : 0
function addDemandeFormation($nomForm,$respForm,$dateDebut,$dateFin,$lieuFormation,$cleInternet,
$nbPcPortable,$nbPcFixe,$nbSouris,$nbVideo,$nbCasqueAudio,$nbCasqueVr,$nbImprimante,$compteImpression){
    $conn = bdd();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nomFormation','name'=>'nomFormation','value'=>$nomForm));
    array_push($conditions, array('nameChamps'=>'responsableFormation','name'=>'responsableFormation','value'=>$respForm));
    array_push($conditions, array('nameChamps'=>'lieuFormation','name'=>'lieuFormation','value'=>$lieuFormation));
    array_push($conditions, array('nameChamps'=>'dateDebut','name'=>'dateDebut','value'=>$dateDebut));
    array_push($conditions, array('nameChamps'=>'dateFin','name'=>'dateFin','value'=>$dateFin));
	array_push($conditions, array('nameChamps'=>'nbPcPortable','name'=>'nbPcPortable','value'=>$nbPcPortable));
    array_push($conditions, array('nameChamps'=>'nbPcFixe','name'=>'nbPcFixe','value'=>$nbPcFixe));
    array_push($conditions, array('nameChamps'=>'nbSouris','name'=>'nbSouris','value'=>$nbSouris));
    array_push($conditions, array('nameChamps'=>'nbVideoProjecteur','name'=>'nbVideoProjecteur','value'=>$nbVideo));
    array_push($conditions, array('nameChamps'=>'nbCasqueAudio','name'=>'nbCasqueAudio','value'=>$nbCasqueAudio));
	array_push($conditions, array('nameChamps'=>'nbCasqueVR','name'=>'nbCasqueVR','value'=>$nbCasqueVr));
	array_push($conditions, array('nameChamps'=>'imprimante','name'=>'imprimante','value'=>$nbImprimante));
    array_push($conditions, array('nameChamps'=>'nbCompteImpression','name'=>'nbCompteImpression','value'=>$compteImpression));
    array_push($conditions, array('nameChamps'=>'cleInternet','name'=>'cleInternet','value'=>$cleInternet));
    array_push($conditions, array('nameChamps'=>'demandeur','name'=>'demandeur','value'=>$_SESSION['id']));
	array_push($conditions, array('nameChamps'=>'dateDemande','name'=>'dateDemande','value'=>date('y-m-d')));
	array_push($conditions, array('nameChamps'=>'idStatutFormation','name'=>'idStatutFormation','value'=>'0'));
    $req =  new myQueryClass('formation',$conditions);
	$r = $req->myQueryInsert();
    $conn = null ; //Quitte la connexion

}



function changeStatutFormation($idFormation,$newStatut){
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'idFormation','type'=>'=','name'=>'idFormation','value'=>$idFormation));
	array_push($values, array('nameChamps'=>'idStatutFormation','name'=>'idStatutFormation','value'=>$newStatut));
	$req =  new myQueryClass('formation',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}



 