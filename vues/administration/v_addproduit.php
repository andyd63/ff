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
              <div class="col-md-2 ">
              </div>
              <div class="col-md-8 ">
              <?php if(isset($alert)){?>
                  <div class="alert alert-primary" role="alert">
                    <?php echo $alert;?>
                  </div>
                 <?php  }?>
                <h6>Ajouter un produit</h6>
                <?php if(isset($errorSuccess)){?>
                <div class="alert alert-success" role="alert">
                   <?=$errorSuccess;?>
              </div><?php }?>
                <form action="index.php?c=admin&action=addproduitValide" enctype="multipart/form-data" method="post" >
                  <ul class="row">
                    <div class="row">
                      <!-- Name -->
                      <li class="col-md-6">
                        <label>Nom du produit
                          <input type="text" name="nomProduit" value="" placeholder="" required>
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Type de matériel
                          <select class="form-control" name="materiel">
                            <?php foreach ($allMateriel as $m){
                              echo "<option value=".$m['idMateriel'].">".$m['nomMateriel']."</option>";
                            }?> 
                          </select>
                        </label>
                      </li>
                    </div>
                    <div class="row">
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Marque
                        <input type="text" name="marque" value="" placeholder="" required>
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label>Système
                          <select class="form-control" name="systeme">   
                            <option value="Aucun">Aucun</option>                  
                            <option value="Windows 7">Windows 7</option>
                            <option value="Windows 10">Windows 10</option>
                            <option value="Android">Android</option>
                          </select>
                      </label>
                    </li>
                    </div>
                    <div class="row">
                      <li class="col-md-12">
                        <label>Description
                          <textarea class="form-control"  name="description" value="" placeholder=""></textarea>
                        </label>
                      </li>
                    </div>     
               
                    </div>
                         <!-- LOGIN -->
                    <li class="col-md-12 text-center margin-top-20">
                      <button  id="addprod" class="btn" type="submit" >Ajouter ce produit</button>
                    </li>
                    
                   
                  </ul>
                  
                </form>
                
              </div>
           
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  
  <?php include('./assets/inc/footer.php');?>