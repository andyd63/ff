<body>
<!-- LOADER -->
<div id="loader">
  <div class="position-center-center">
    <div class="ldr"></div>
  </div>
</div>

<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <header>
    <div class="sticky textAlignCenter">
    <div class="col-md-12 textAlignCenter headerLogo"> <a href="index.php"><img  class="logoSite img-responsive" src="<?=$configSite->logoSite;?>" alt="" ></a> 

    <div id="incMenuResponsive" class="menuResponsive"><i class="fas fa-bars fa-2x"></i></div>
    </div>
        <!-- Logo -->
        
        <nav class="navbar ">

          <!-- NAV -->
          <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">
          
          <?php foreach(allSiteMenuGroupe() as $groupe){ 
                if(strlen($groupe['nomAction']) < 1){
                  $param = 'c='.$groupe['nomControleur'];
              }else{
                  $param = 'c='.$groupe['nomControleur'].'&action='.$groupe['nomAction'];
              }
                 if($groupe['sousMenu'] == 0){  
                  if($groupe['connecte'] == 1) // si besoin d'etre co 
                    {
                                    if(isset($_SESSION['mail'])){?>
                                     <li> <a class="survol" href="index.php?<?=$param;?>"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a> </li>
                                    <?php }
                                }else{}
                          
                  if(($groupe['connecte'] == 0) &&  (!isset($_SESSION['mail']))){ // que quand tu es déco
                    ?> <li> <a class="survol" href="index.php?<?=$param;?>"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a> </li> <?php 
                  }
                  if($groupe['connecte'] == 2){ // les deux
                    ?> <li> <a class="survol" href="index.php?<?=$param;?>"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a> </li> <?php 
                  }
                  if(isset($_SESSION['mail'])){
                  if(($groupe['connecte'] == 3) &&  (adminexist($_SESSION['mail']))){ // administration 
                    ?>

                    <li class="dropdown "> <a class="survol" href="index.php?<?=$param;?>"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                    <?php
                  }}
                  
              }else {
                if(($groupe['connecte'] == 1) &&  (isset($_SESSION['mail']))){ // que quand tu es co
                ?> <li class="dropdown "> <a class="survol" href="#." class="dropdown-toggle" data-toggle="dropdown"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                  <?php
                }
                    if(($groupe['connecte'] == 0) &&  (!isset($_SESSION['mail']))){ // que quand tu es déco 
                    ?>
                    <li class="dropdown "> <a class="survol" href="#." class="dropdown-toggle" data-toggle="dropdown"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                    <?php }
                    if($groupe['connecte'] == 2){ // les deux 
                      ?>

                      <li class="dropdown "> <a class="survol" href="#." class="dropdown-toggle" data-toggle="dropdown"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                      <?php
                    }
                    if(isset($_SESSION['mail'])){
                    if(($groupe['connecte'] == 3) &&  (adminexist($_SESSION['mail']))){ // administration 
                      ?>

                      <li class="dropdown "> <a class="survol" href="#." class="dropdown-toggle" data-toggle="dropdown"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                      <?php
                    }}?>

                <ul class="dropdown-menu">
                  <?php          
                      foreach(allSiteMenuV($groupe['id']) as $lien){ 
                   
                               if($lien['nomAction'] == ''){
                                    $param = 'c='.$lien['nomControleur'];
                                }else{
                                    $param = 'c='.$lien['nomControleur'].'&action='.$lien['nomAction'];
                                }
                                if($lien['connecte'] == 1){
                                    if(isset($_SESSION['mail'])){?>
                                     <li> <a class="survol" href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li>
                                    <?php }
                                }else{ }
                                if(($lien['connecte'] == 0) &&  (!isset($_SESSION['mail']))){ // que quand tu es déco
                                  ?> <li> <a class="survol" href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li> <?php 
                                }
                                if($lien['connecte'] == 2){ // les deux
                                  ?> <li> <a class="survol" href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li> <?php 
                                }
                                if(isset($_SESSION['mail'])){
                                  if(($groupe['connecte'] == 3) &&  (adminexist($_SESSION['mail']))){ // administration 
                                    ?><li> <a class="survol" href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li> <?php 
                                  }
                                }

                               }
                   ?>
                   </ul>
              </li> <?php }?>
              
              <?php }?>
                          
              
      
              
            
              
            
          
            </ul>
          </div>
        </nav>

    </div>
  </header>