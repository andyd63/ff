  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              <div class="col-md-12 ">
              <?php if(isset($alert)){?>
                  <div class="alert alert-primary" role="alert">
                    <?php echo $alert;?>
                  </div>
                 <?php  }?>
                <h6>Les formations </h6>
              <table id="produitDispo" class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Lieu</th>
                    <th scope="col">Début</th>
                    <th scope="col">Fin</th>
                    <th scope="col">Date demande</th>
                    <th scope="col">Etat</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($mesFormations as $f){?>
                  <tr>
                    <th scope="row"><?= $f['nomFormation'];?></th>
                    <td><?= $f['responsableFormation'];?></td>
                    <td><?= $f['lieuFormation'];?></td>
                    <td><?= $f['dateDebut'];?></td>
                    <td><?= $f['dateFin'];?></td>
                    <td><?= $f['dateDemande'];?></td>
                    <td><?= statutFormation($f['idStatutFormation']);?></td>
                    <td><a class="btn" href="index.php?c=client&action=mademande&id=<?= $f['idFormation'];?>"><i class="fas fa-search-plus fa-lg"></i> Voir</a></td>
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
           
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <script>
   $(document).ready(function() {
        getDataTable('produitDispo');
    });
</script>
  <?php include('./assets/inc/footer.php');?>