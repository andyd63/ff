

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');
  ?> 

  
  <!-- Content -->
  <div id="content"> 
    <!--======= PAGES INNER =========-->
    <section class="padding-top-30 padding-bottom-100 shopping-cart small-cart">
      <div class="container"> 
      <?php if(!isset($error)){?>
      <a class="btn btnPrecedent" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i> Page Précédente</A><hr>
      <?php } else{  genererError(17); }?>
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            <!-- DISCOUNT CODE -->
            <div class="col-sm-8">
            <h6>Information sur la demande #<?= $maFormation['idFormation'] ;?> </h6>
            <p>Lieu de formation: <span class='enGras'><?= $maFormation['lieuFormation'];?></p>
            <p>Responsable de la formation: <span class='enGras'><?= $maFormation['responsableFormation'];?></p>
            <p>Date de la demande: <span class='enGras'><?= $maFormation['dateDemande'];?></p>
            <p>Date de début: <span class='enGras'><?= $maFormation['dateDemande'];?></p>
            <?php if($maFormation['dateFin'] != null){?><p>Date de la fin: <span class='enGras'><?php echo $maFormation['dateFin'];?></span></p><?php } else{?>
            <p><span class='enGras'>Demande permanente</span></p>
            <?php } if($maFormation['datePriseMateriel'] != null){?><p>Récupération du matériel: <span class='enGras'><?php echo $maFormation['datePriseMateriel'];?></span></p><?php }?>
            <br>

            <h6>Statut de la demande</h6>
            <ul class="progressbar">
              <?php foreach($allStatutFormation as $statut){
                if ($maFormation['idStatutFormation'] == '5'){ 
               if($statut['idStatutFormation']  == 5 ){?>
                    <li <?php if($statut['idStatutFormation'] <= $maFormation['idStatutFormation']){ echo 'class="active"';}?>><?= $statut['nomStatut'];?></li>
                  <?php }
                }else{
                  if($statut['idStatutFormation']  != 5 ){?>
                    <li <?php if($statut['idStatutFormation'] <= $maFormation['idStatutFormation']){ echo 'class="active"';}?>><?= $statut['nomStatut'];?></li>
                  <?php }
                }
              ?>
     
             
              <?php }?>
            </ul>
            </div>
            <!-- SUB TOTAL -->
            <div class="col-sm-4">
              <h6>Récapitulatif</h6>
              <div class="grand-total">
                <div class="order-detail">
                    <p><?=$maFormation['nbPcPortable'];?> Pc portable</p>
                    <p><?=$maFormation['nbPcFixe'];?> Pc fixe</p>
                    <p><?=$maFormation['nbSouris'];?> Souris</p>
                    <p><?=$maFormation['nbVideoProjecteur'];?> Vidéo projecteur</p>
                    <p><?=$maFormation['nbCasqueAudio'];?> Casques audios</p>
                    <p><?=$maFormation['nbCasqueVR'];?> Casques VR</p>
                    <p><?=$maFormation['imprimante'];?> Imprimante</p>
                    <p><?=$maFormation['nbCompteImpression'];?> Comptes impressions</p>
                    <p><?=$maFormation['cleInternet'];?> Clés internet</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--======= PAGES INNER =========-->
    <section class="padding-bottom-100 pages-in chart-page shopping-cart">
      <div class="container cart-ship-info">
        <div class="row"> 
            <!-- DISCOUNT CODE -->
            <div class="col-sm-8">
              <h6>Les produits</h6>
              <table id="example" class="table" style="width:100%">
              <thead>
              <tr>
                  <th>Nom produit</th>
                  <th>Type matériel</th>
              </tr>
              </thead>
              <tbody>
                <?php 
                if($mesProduits != false){
                foreach($mesProduits as $p){
                  echo "<tr ><th scope='row'>".$p['nomProduit']."</th>";
                  echo "<td>".nomMateriel($p['idMateriel'])."</td></tr>";
                }}?>
              </tbody>
              </table>
            </div>
        </div>
      </div>
    </section>
    </div>

  

<script>   
   $(document).ready(function() {
     getDataTable('example');
   });
</script>
 
  <?php include('./assets/inc/footer.php');?>
  