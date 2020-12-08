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
            <a class="btn btnPrecedent" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i> Page Précédente</A>
            <a class="btn btnPrecedent" href="index.php?c=admin&action=mesProduits"><i class="fas fa-search-plus fa-lg"></i> Lecture</A>
            <a class="btn btnPrecedent" href="index.php?c=admin&action=mesProduits&modif=1"><i class="fas fa-pen"></i> Modifier</A><hr>
              <div class="col-md-12 ">
                <h6>Mes produits </h6>
              <table id="produitDispo" class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom Pc</th>
                    <th scope="col">Type</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Formation</th>
                    <th scope="col">Système</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allProduit as $produitP){?>
                  <tr>
                    <th scope="row"><?= $produitP['nomProduit'];?></th>
                    <td><?= nomMateriel($produitP['idMateriel']);?></td>
                    <td><?= statutProduit($produitP['statutProduit']);?></td>
                    <td><?php if(isset($_GET['modif'])){?>
                    <select class="form-control changeFormation" id="<?=$produitP['idProduit'];?>">
                    <?php foreach ($allFormation as $f){
                      $s = '';
                      if($produitP['idFormation'] == $f['idFormation']){ $s= 'Selected'; }
                      echo "<option value=".$f['idFormation']." ".$s.">".$f['nomFormation']."</option>";
                    }?> 
                    </select><?php } else{   echo nomFormation($produitP['idFormation']); } ?>
                    </td>
                    <td><?= $produitP['systemeProduit'];?></td>
                    <td><?= $produitP['marqueProduit'];?></td>
                    <td><?= $produitP['descriptionProduit'];?></td>
                    <td><a class="btn" href="index.php?c=admin&action=updateproduit&id=<?= $produitP['idProduit'];?>"><i class="fas fa-search-plus fa-lg"></i> Editer</a></td>
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
        $('.changeFormation').change(function(e){ 
        url= 'index.php?c=admin&action=changeFormation';
        var selectElmt = document.getElementById(e.target.id);
        var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;  
        var textselectionne = selectElmt.options[selectElmt.selectedIndex].text; 
        param = 'idProduit='+e.target.id+"&idFormation="+valeurselectionnee;
        reponse = postAjax(param,url);
        rep = jQuery.parseJSON(reponse.responseText);
        alertJs(rep.success,rep.msg);
       
      });
    });
</script>
  <?php include('./assets/inc/footer.php');?>