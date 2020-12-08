<?php


require_once('./modeles/m_bdd.php');
require_once('./modeles/m_clients.php');
require_once('modeles/m_alert.php');
require_once('./modeles/m_statutProduit.php');
require_once('./modeles/m_module.php');
require_once('./assets/inc/_initGeneral/functionInit.php');
require_once('./assets/inc/function.php');
require_once('./modeles/mGlobal/m_menu.php');
require_once('./modeles/m_configSite.php');

$configSite = initConfigSite();


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Andy Douarre">
<title><?= $configSite->nameSite;?></title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="./css/ionicons.min.css" rel="stylesheet">
<link href="./css/main.css" rel="stylesheet">
<link href="./css/admin.css" rel="stylesheet">
<link href="./css/basic.css" rel="stylesheet">
<link href="./css/style.css" rel="stylesheet">
<link href="./css/general.css" rel="stylesheet">
<link href="./css/boutique.css" rel="stylesheet">
<link href="./css/responsive.css" rel="stylesheet">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- JavaScripts -->
<script src="./js/modernizr.js"></script>
<script src="./js/commun.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.22/sp-1.2.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.22/sp-1.2.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>


<script src="https://cdn.tiny.cloud/1/bwkohbx6klhjryo3yzjrkhz2of52v8ir0chg0jyjj87guogd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src='https://cdn.tiny.cloud/1/bwkohbx6klhjryo3yzjrkhz2of52v8ir0chg0jyjj87guogd/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    tinymce.init({
      selector: '.mytextarea'
    });
  </script>
 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Online Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<?php

$configSite = initConfigSite();
initParamBoolSite($configSite);



