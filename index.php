<?php



date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK

require_once ('./classes/collection.php');
require_once ('./classes/produits.php');
require_once ('./classes/configSite.php');
require_once ('./classes/paramSite.php');
//require_once ('./classes/photo.php');
require_once ('./classes/myQuery.php');	
require_once('./assets/inc/_initGeneral/functionInit.php');
require_once('./modeles/m_configSite.php');

session_start();
if(!isset($_SESSION['id'])){
	include("./Controleurs/c_connexion.php"); 
}else{
	        // Menu MasterPage
	        if (isset($_REQUEST['c']))   {
		       switch ($_REQUEST['c'])      {
				   case 'accueil' : include("./vues/accueil.php"); break;
				   case 'client' : include("./Controleurs/c_client.php"); break;
				   case 'admin' : include("./Controleurs/c_administration.php"); break;
				   case 'configSite' : include("./Controleurs/c_administrationGlobal.php"); break;
				   case 'connexion' : include("./Controleurs/c_connexion.php"); break;	
				   case 'deconnexion' : include("./vues/v_deconnexion.php"); break;
                        
				   default : include("./vues/accueil.php"); break;
		        }
			 }
		     else  {
			include("./vues/accueil.php"); 
			 }
}
      