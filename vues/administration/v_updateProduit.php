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
          <a class="btn btnPrecedent" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i> Page Précédente</A><hr>
            <div class="row"> 
              <div class="col-md-2 ">
              </div>
              <div class="col-md-8 ">
              <?php if(isset($alert)){?>
                  <div class="alert alert-primary" role="alert">
                    <?php echo $alert;?>
                  </div>
                 <?php  }?>
                <h6>Modifier un produit</h6>
                <?php if(isset($errorSuccess)){?>
                <div class="alert alert-success" role="alert">
                   <?=$errorSuccess;?>
              </div><?php }?>
                  <ul class="row">
                    <div class="row">
                      <!-- Name -->
                      <li class="col-md-6">
                        <label>Nom du produit
                          <input type="text" name="nomProduit" value="<?=$produit['nomProduit'];?>" placeholder=""  disabled>
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Type de matériel
                          <select class="form-control" name="materiel" disabled>
                            <?php foreach ($allMateriel as $m){
                              $s = '';
                              if($produit['idMateriel'] == $m['idMateriel']){ $s= 'Selected'; }
                              echo "<option value=".$m['idMateriel']." ".$s.">".$m['nomMateriel']."</option>";
                            }?> 
                          </select>
                        </label>
                      </li>
                    </div>
                    <div class="row">
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Statut
                        <select class="form-control" id="statut">
                            <?php foreach ($allStatut as $s){
                              $select = '';
                              if($produit['statutProduit'] == $s['idStatutProduit']){ $select= 'Selected'; }
                              echo "<option value=".$s['idStatutProduit']." ".$select.">".$s['nomStatut']."</option>";
                            }?> 
                          </select>
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label>Formation
                      <select class="form-control" id="formation">
                            <?php foreach ($allFormation as $f){
                              $s = '';
                              if($produit['idFormation'] == $f['idFormation']){ $s= 'Selected'; }
                              echo "<option value=".$f['idFormation']." ".$s.">".$f['nomFormation']."</option>";
                            }?> 
                          </select>
                      </label>
                    </li>
                    </div>

                    <div class="row">
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Marque
                        <input type="text" id="marque" value="<?=$produit['marqueProduit'];?>" placeholder="" required>
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label>Système
                          <select class="form-control" id="systeme">   
                            <option value="Aucun" <?php if($produit['systemeProduit'] == 'Aucun'){ echo 'Selected';}?>>Aucun</option>                  
                            <option value="windows 7" <?php if($produit['systemeProduit'] == 'windows 7'){ echo 'Selected';}?>>Windows 7</option>
                            <option value="windows 10" <?php if($produit['systemeProduit'] == 'windows 10'){ echo 'Selected';}?>>Windows 10</option>
                            <option value="Android" <?php if($produit['systemeProduit'] == 'Android'){ echo 'Selected';}?>>Android</option>
                          </select>
                      </label>
                    </li>
                    </div>
                    <div class="row">
                      <li class="col-md-12">
                        <label>Description
                          <textarea class="form-control"  id="description" value="<?=$produit['descriptionProduit'];?>" placeholder=""></textarea>
                        </label>
                      </li>
                    </div>     
               
                    </div>
                         <!-- LOGIN -->
                    <li class="col-md-12 text-center margin-top-20">
                      <p  id="updateprod" class="btn" type="submit" >Modifier ce produit</button>
                    </li>
                    
                   
                  </ul>
                
              </div>
           
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <script>
    $(document).ready(function() {
      $('.btn').click(function(e){ 
        url= 'index.php?c=admin&action=updateProduitForm';
        marque = document.getElementById("marque").value;
        description = document.getElementById("description").value;

        select = document.getElementById("statut");
        choice = select.selectedIndex  // Récupération de l'index du <option> choisi
        statut = select.options[choice].value; // Récupération du texte du <option> d'index "choice"

        select = document.getElementById("formation");
        choice = select.selectedIndex  // Récupération de l'index du <option> choisi
        formation = select.options[choice].value; // Récupération du texte du <option> d'index "choice"

        select = document.getElementById("systeme");
        choice = select.selectedIndex  // Récupération de l'index du <option> choisi
        systeme = select.options[choice].value; // Récupération du texte du <option> d'index "choice"

        param = 'id='+$_GET('id')+"&marque="+marque+ "&desc="+description+"&statut="+statut+"&form="+formation+"&systeme="+systeme;
        reponse = postAjax(param,url);
        rep = jQuery.parseJSON(reponse.responseText);
        alertJs(rep.success,rep.msg);
       

      });

      getDataTable('tableCli');
      });
  </script>
  <?php include('./assets/inc/footer.php');?>