<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

//////////////// AJOUT d'un produit /////////////////////////

function addproduit($nom,$materiel,$marque,$systeme,$description){
    $conn = bdd();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nomProduit','name'=>'nomProduit','value'=>$nom));
    array_push($conditions, array('nameChamps'=>'idMateriel','name'=>'idMateriel','value'=>$materiel));
    array_push($conditions, array('nameChamps'=>'marqueProduit','name'=>'marqueProduit','value'=>$marque));
    array_push($conditions, array('nameChamps'=>'systemeProduit','name'=>'systemeProduit','value'=>$systeme));
    array_push($conditions, array('nameChamps'=>'descriptionProduit','name'=>'descriptionProduit','value'=>$description));
    array_push($conditions, array('nameChamps'=>'statutProduit','name'=>'statutProduit','value'=>'0'));
    $req =  new myQueryClass('produit',$conditions);
	$r = $req->myQueryInsert();
    $conn = null ; //Quitte la connexion

}


//function retrouve le dernier produit 
function voirDernierProduit(){
$order = array();
array_push($order, array('nameChamps'=>'id','sens'=>'desc'));
$req =  new myQueryClass('produit','',$order);
$r = $req->myQuerySelect();
return $r[0] ;
}

    
function allProduit(){
	$req =  new myQueryClass('produit');
	$r = $req->myQuerySelect();
	return $r;
}




//voir produit selon l'id
function voirProduitById($id){
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'idProduit','type'=>'=','name'=>'idProduit','value'=>$id));
    $req =  new myQueryClass('produit',$conditions);
    $r = $req->myQuerySelect();
    if(count($r)==0){
        $r = false;
    }else{
        $r = $r[0];
    }
	return $r;
}

//voir produit selon l'id formation
function voirProduitByIdFormation($id){
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'idFormation','type'=>'=','name'=>'idFormation','value'=>$id));
    $req =  new myQueryClass('produit',$conditions);
    $r = $req->myQuerySelect();
    if(count($r)==0){
        $r = false;
    }
	return $r;
}




function changeProduit($idProduit, $marque,$desc,$statut,$form,$systeme)
{
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'idProduit','type'=>'=','name'=>'idProduit','value'=>$idProduit));
    array_push($values, array('nameChamps'=>'marqueProduit','name'=>'marqueProduit','value'=>$marque));
    array_push($values, array('nameChamps'=>'descriptionProduit','name'=>'descriptionProduit','value'=>$desc));
    array_push($values, array('nameChamps'=>'statutProduit','name'=>'statutProduit','value'=>$statut));
    array_push($values, array('nameChamps'=>'idFormation','name'=>'idFormation','value'=>$form));
    array_push($values, array('nameChamps'=>'systemeProduit','name'=>'systemeProduit','value'=>$systeme));
	$req =  new myQueryClass('produit',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}

function changeProduitFormation($idProduit,$form)
{
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'idProduit','type'=>'=','name'=>'idProduit','value'=>$idProduit));
    array_push($values, array('nameChamps'=>'idFormation','name'=>'idFormation','value'=>$form));
	$req =  new myQueryClass('produit',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}



function changeProduitDateReservation($idProduit,$valeur,$idClient =NULL)
{
	$conditions = array();
    $values = array();
    
    $date = date('Y-m-d H:i:s');
    $year = substr($date, 0, -15);   
    $month = substr($date, 5, 2);   
    $day = substr($date, 8,2); 
    $heure = substr($date, 11,2); 
    $minute = substr($date, 14,2);     

 
    // récupère la date du jour
    $date_string = mktime($heure,$minute,0,$month,$day,$year);
    $datee = date("Y-m-d H:i:s", $date_string); 
	array_push($conditions, array('nameChamps'=>'id','type'=>'=','name'=>'id','value'=>$idProduit));
    array_push($values, array('nameChamps'=>'etatDuProduit','name'=>'etatDuProduit','value'=>$valeur));
    array_push($values, array('nameChamps'=>'idClient','name'=>'idClient','value'=>$idClient));
    array_push($values, array('nameChamps'=>'dateReservation','name'=>'dateReservation','value'=>$datee));
	$req =  new myQueryClass('produit',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}


function changeProduitDateReservationNull()
{
	$conditions = array();
    $values = array();
    $date = date('Y-m-d H:i:s');
    $year = substr($date, 0, -15);   
    $month = substr($date, 5, 2);   
    $day = substr($date, 8,2); 
    $heure = substr($date, 11,2); 
    $minute = substr($date, 14,2);     

 
    // récupère la date du jour
    $date_string = mktime($heure,$minute,0,$month,$day,$year);
    // Supprime une heure
    $dateMoinsUneHeure = $date_string -  3600;
    
    $dateMoinsUneHeure = date("Y-m-d H:i:s", $dateMoinsUneHeure); 
    
	array_push($conditions, array('nameChamps'=>'dateReservation','type'=>'<','name'=>'dateReservatio','value'=>$dateMoinsUneHeure));
    array_push($values, array('nameChamps'=>'idClient','name'=>'idClient','value'=>null));
    array_push($values, array('nameChamps'=>'dateReservation','name'=>'dateReservation','value'=>null));
	$req =  new myQueryClass('produit',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion*/
}


?>