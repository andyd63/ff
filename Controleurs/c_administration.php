<?php
require_once "./modeles/m_bdd.php";
require_once "./modeles/m_clients.php";
require_once "./modeles/m_menuadmin.php";
require_once "./modeles/m_couleur.php";
require_once('./modeles/m_statutProduit.php');
require_once('./modeles/m_statutFormation.php');
require_once('./modeles/m_formation.php');
require_once "./modeles/m_materiel.php";
require_once "./modeles/m_boxAdmin.php";
require_once "./modeles/m_module.php";
require_once "./modeles/m_produit.php";
require_once "./assets/inc/function.php";


require_once "./assets/inc/function.php";
$conn = bdd();

if(isset($_GET['action']))
{
	$action = $_GET['action'];
}
else
	$action = 'accueil';


switch($action)
{
    case 'accueil':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    $menuAdmin = menuAdminByNom('General');
	include('./vues/administration/v_admin_def.php');
    break;
    
    case 'accueilProduit':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $menuAdmin = menuAdminByNom('Produit');
        include('./vues/administration/v_admin_def.php');
    break;
	
    case 'accueilCommande':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $menuAdmin = menuAdminByNom('Commande');
        include('./vues/administration/v_admin_def.php');
    break;

    case 'mesClients':
        $allClient = allClientTotal();
        include('./vues/administration/v_mesclients.php'); 
    break;

    case 'updateproduit':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $produit = voirProduitById($_GET['id']);
        $allMateriel = allMateriel(); 
        $allFormation = allFormation(); 
        $allStatut = allStatutProduit();
        include('./vues/administration/v_updateProduit.php');
    break;  

    case 'updateProduitForm':
        $m = changeProduit($_POST['id'], $_POST['marque'],$_POST['desc'],$_POST['statut'],$_POST['form'],$_POST['systeme']);
        $rep = reponse_json(true, $m , 'La demande de formation est faite! Vous allez être redirigé d\'ici 5 secondes.');
	    appelAjax($rep);
    break;

    case 'changeFormation':
        $m = changeProduitFormation($_POST['idProduit'],$_POST['idFormation']);
        $rep = reponse_json(true, $m, 'Produit modifié');
	    appelAjax($rep);
    break;
 
    case 'addproduit':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    $allMateriel = allMateriel(); 
    include('./vues/administration/v_addproduit.php');
    break;

    case 'ajoutdonnee':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        include('./vues/administration/v_addDonneTable.php');
        break;  

    case 'addproduitValide':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    addproduit($_POST['nomProduit'],$_POST['materiel'],$_POST['marque'],$_POST['systeme'],$_POST['description']);
    $errorSuccess = "Le produit est ajouté!";
    include('./vues/administration/v_addproduit.php');
    break;    

    case 'mesProduits':
        $allProduit = allProduit();
        $allFormation = allFormation(); 
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        include('./vues/administration/v_mesProduits.php'); 
    break;

    case 'lesdemandes':
        $formationNonTraite = formationNonTraite();
        $formationEnPreparation = formationEnPreparation();
        $formationEnValise = formationEnValise();
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        include('./vues/administration/v_lesDemandes.php'); 
    break;

    case 'demande' :
		if(isset($_SESSION['id'])){
			$allStatutFormation = allStatutFormation();
			$maFormation = maFormation($_GET['id']);
			require_once('./vues/v_demande.php');
		}else{
			redirectUrl("index.php?c=connexion");
		}
    break;
    
    case 'updateDemande':
        $m = changeStatutFormation($_POST['idFormation'],$_POST['newStatut']);
        $rep = reponse_json(true, $m , 'La formation a changé de statut!');
	    appelAjax($rep);
    break;

		
	case 'mesformations' :
		if(isset($_SESSION['id'])){
			$mesFormations = allFormation();  
			require_once('./vues/v_mesDemandes.php');
		}else{
			redirectUrl("index.php?c=connexion");
		}
	break;

    default: 
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $menuAdmin = menuAdminByNom('General');
        include('./vues/administration/v_admin_def.php');
    break;

   
}


?>