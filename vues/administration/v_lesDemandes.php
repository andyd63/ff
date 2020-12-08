  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-bottom-10">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              <div class="col-md-12 ">
              <a class="btn btnPrecedent" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i> Page Précédente</A><hr>
                <h6>Les demandes non traitées</h6>
              <table id="formationNonTraite" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Demandeur</th>
                    <th scope="col">Date début</th>
                    <th scope="col">Date fin</th>
                    <th scope="col">Date demande</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($formationNonTraite as $formNonTraite){
                    $cli = informations($formNonTraite['demandeur']);
                    ?>
                  <tr id='demandeNonTraite<?= $formNonTraite['idFormation'];?>'>
                    <th scope="row"><a class="btn" href="index.php?c=admin&action=demande&id=<?= $formNonTraite['idFormation'];?>"><?= $formNonTraite['idFormation'];?></a></th>
                    <td><?= $formNonTraite['nomFormation'];?></td>
                    <td><?= $cli['MAIL_CLIENTS'];?></td>
                    <td><?= $formNonTraite['dateDebut'];?></td>
                    <td><?= $formNonTraite['dateFin'];?></td>
                    <td><?= $formNonTraite['dateDemande'];?></td>
                    <td><a class="btn updateCommandeNonTraiteOk" id="<?= $formNonTraite['idFormation'];?>"><i class="vert  fas fa-check"></i> Ok</a>
                    <a class="btn updateCommandeNonTraiteNok" id="<?= $formNonTraite['idFormation'];?>"><i class="rouge  fas fa-times"></i> NOK</a>
                    </td>
                 </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              <br>              
              <hr>
           
              </div>
        
            </div>
          </div>
      
    </section>
     <!--======= PAGES INNER =========-->
     <section class="chart-page ">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              <div class="col-md-12 ">
                <h6>Les formations en préparation</h6>
              <table id="formationEnPreparation" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Demandeur</th>
                    <th scope="col">Date début</th>
                    <th scope="col">Date fin</th>
                    <th scope="col">Date demande</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($formationEnPreparation as $formNonTraite){
                    $cli = informations($formNonTraite['demandeur']);
                    ?>
                  <tr id='demandeNonTraite<?= $formNonTraite['idFormation'];?>'>
                    <th scope="row"><a class="btn" href="index.php?c=admin&action=demande&id=<?= $formNonTraite['idFormation'];?>"><?= $formNonTraite['idFormation'];?></a></th>
                    <td><?= $formNonTraite['nomFormation'];?></td>
                    <td><?= $cli['MAIL_CLIENTS'];?></td>
                    <td><?= $formNonTraite['dateDebut'];?></td>
                    <td><?= $formNonTraite['dateFin'];?></td>
                    <td><?= $formNonTraite['dateDemande'];?></td>
                    <td><a class="btn updateCommandeNonTraitePret" id="<?= $formNonTraite['idFormation'];?>"><i class="vert  fas fa-check"></i> Prêt</a></td>
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              <br>              
              <hr>
           
              </div>
        
            </div>
          </div>
      
    </section>
 <!--======= PAGES INNER =========-->
 <section class="chart-page ">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              <div class="col-md-12 ">
                <h6>Les formations en valise</h6>
              <table id="formationEnValise" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Demandeur</th>
                    <th scope="col">Date début</th>
                    <th scope="col">Date fin</th>
                    <th scope="col">Date demande</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($formationEnValise as $formNonTraite){
                    $cli = informations($formNonTraite['demandeur']);
                    ?>
                  <tr id='demandeNonTraite<?= $formNonTraite['idFormation'];?>'>
                    <th scope="row"><a class="btn" href="index.php?c=admin&action=demande&id=<?= $formNonTraite['idFormation'];?>"><?= $formNonTraite['idFormation'];?></a></th>
                    <td><?= $formNonTraite['nomFormation'];?></td>
                    <td><?= $cli['MAIL_CLIENTS'];?></td>
                    <td><?= $formNonTraite['dateDebut'];?></td>
                    <td><?= $formNonTraite['dateFin'];?></td>
                    <td><?= $formNonTraite['dateDemande'];?></td>
                    <td><a class="btn updateCommandeValise" id="<?= $formNonTraite['idFormation'];?>"><i class="vert  fas fa-check"></i>Parti</a></td>
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              <br>              
              <hr>
           
              </div>
        
            </div>
          </div>
      
    </section>

  </div>
<style>

</style>
  <script>
    getDataTable('formationNonTraite');
    getDataTable('commandeTraite');

    // mettre une date de colie
    $('.updateCommandeNonTraiteOk').click(function(e){ 
      url= 'index.php?c=admin&action=updateDemande';
      param = 'idFormation='+e.target.id+"&newStatut=1";
      reponse = postAjax(param,url);
      document.getElementById('demandeNonTraite'+e.target.id).remove();
      rep = jQuery.parseJSON(reponse.responseText);
      alertJs(false,rep.msg);
    });

    $('.updateCommandeNonTraiteNok').click(function(e){ 
      url= 'index.php?c=admin&action=updateDemande';
      param = 'idFormation='+e.target.id+"&newStatut=5";
      reponse = postAjax(param,url);
      rep = jQuery.parseJSON(reponse.responseText);
      document.getElementById('demandeNonTraite'+e.target.id).remove();
      alertJs(false,rep.msg);
    });

    $('.updateCommandeNonTraitePret').click(function(e){ 
      url= 'index.php?c=admin&action=updateDemande';
      param = 'idFormation='+e.target.id+"&newStatut=2";
      reponse = postAjax(param,url);
      rep = jQuery.parseJSON(reponse.responseText);
      document.getElementById('demandeNonTraite'+e.target.id).remove();
      alertJs(false,rep.msg);
    });

    $('.updateCommandeValise').click(function(e){ 
      url= 'index.php?c=admin&action=updateDemande';
      param = 'idFormation='+e.target.id+"&newStatut=3";
      reponse = postAjax(param,url);
      rep = jQuery.parseJSON(reponse.responseText);
      document.getElementById('demandeNonTraite'+e.target.id).remove();
      alertJs(false,rep.msg);
    });
</script>
  <?php include('./assets/inc/footer.php');?>