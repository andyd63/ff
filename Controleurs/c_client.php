<?php
require_once "./modeles/m_clients.php";
require_once "./modeles/m_formation.php";
require_once "./modeles/m_statutFormation.php";
require_once('modeles/m_produit.php');
require_once('modeles/m_materiel.php');
require_once "./assets/inc/function.php";

if(isset($_GET['action']))
	$action = $_GET['action'];
else{
	$action = "profil";
}
switch ($action){
	
	case 'demande' : 
	if(isset($_SESSION['id']))
	{  
		require_once('./vues/v_createDemande.php');
	}else{
		redirectUrl("index.php?c=connexion");
	}
	break;
	
	
	case 'demandeForm' :
		if($_POST['permanente']){
			$dateFin = null;
		}else{
			$dateFin = $_POST['dateFin'];
		}
		$m = addDemandeFormation($_POST['nomForm'],$_POST['respForm'],
		$_POST['dateDebut'],$dateFin,$_POST['lieuFormation'],
		$_POST['cleInternet'],
		$_POST['nbPcPortable'],$_POST['nbPcFixe'],
		$_POST['nbSouris'],$_POST['nbVideo'],$_POST['nbCasqueAudio'],
		$_POST['nbCasqueVr'],$_POST['nbImprimante'],
		$_POST['compteImpression']);
		$rep = reponse_json(true, $m , 'La demande est envoyée, vous allez être redirigé dans 3 secondes');
	    appelAjax($rep);
	break;
		
	case 'mesdemandes' :
		if(isset($_SESSION['id'])){
			$mesFormations = mesFormations($_SESSION['id']);  
			require_once('./vues/v_mesDemandes.php');
		}else{
			redirectUrl("index.php?c=connexion");
		}
	break;
		
	case 'mademande' :
		if(isset($_SESSION['id'])){
			$allStatutFormation = allStatutFormation();
			$maFormation = maFormation($_GET['id']);
			$mesProduits = voirProduitByIdFormation($_GET['id']);
			require_once('./vues/v_maDemande.php');
		}else{
			redirectUrl("index.php?c=connexion");
		}
	break;

	/*** retourne tout les clients json */
	case 'allclient': 
		if(adminexist() == 0){
		redirectionNonAdmin(adminexist());
		} else {
		appelAjax(allClient($_GET['term']));
		}
	break;

	case 'modif' : 
	$message = modifclient($_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['telephone']);
	$cli = informationsRest($_SESSION['id']);
	$cli = json_decode($cli);
	require_once('vues/vue_profil.php');
	
	break;

	//Modifier le mot de passe avec un token
	case 'modifMdpToken' : 
	$message = updateMdpClient($_POST['token'],$_POST['mdp']);
	$rep = reponse_json(true, $message , 'Votre mot de passe est réinitialisé, vous pouvez désormais vous connecter!');
	appelAjax($rep);
	break;

	// Action en ajax qui permet de mettre un token dans la bdd pour réinitialiser le mot de passe
	case 'reinitMdp' : 
		$token = updateTokenClient($_POST['email']);
		$configSite = initConfigSite();
		initParamBoolSite($configSite);
		$mail = mailMdpClient($configSite,$token,$_POST['email']);
		echo reponse_json(true,'','Nous vous avons envoyé un mail de réinitialisation de votre mot de passe!');
	break;

	// réinitialiser le mot de passe
	case 'formMdp' : 
		$client = getClientToken($_GET['token']);
		if(isset($client[0])){
			require_once('vues/v_reinitMdp.php');
		}else{
			redirectUrl('index.php?c=connexion&action=oublie');
		}
		
	break;


	//Test si mail existe
	case 'verifMail' : 
	if(isset($_GET['ajx'])){
		$erreur = userMailExist($_GET['email']);
		appelAjax($erreur);
	}
	break;

	default :
	if((isset($_SESSION['id']) && isset($_GET['ajx'])))
	{  
		$cli = informationsRest($_SESSION['id']);
		if(!isset($_GET['ajx'])){ //appel normal
			$cli = json_decode($cli);
		
			require_once('vues/vue_profil.php');
		} else	{ // Appel Ajax
			appelAjax($cli);
		}
	}else{
		redirectUrl("index.php?c=accueil");
	}
        break;
}

?>