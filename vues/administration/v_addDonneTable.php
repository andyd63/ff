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
                <h6>Ajouter des données dans une table</h6>
                <?php if(isset($_GET['s'])){
                  if($_GET['s'] == 'success'){
                    genererError(6);
                  }else{
                    genererError(7);
                  }
                  
                ?>
              <?php }?>
                <form action="./export/v_export.php" enctype="multipart/form-data" method="post" >
                  <ul class="row">
                    <div class="row">
                      <!-- Name -->
                      <li class="col-md-6">
                        <label>Nom de la table
                          <input type="text" name="nomTable" value="" placeholder="" required>
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Fichier
                          <input type="file" name="fichier" class="form-control-file" >
                        </label>
                      </li>

                         <!-- LOGIN -->
                    <li class="col-md-12 text-center margin-top-20">
                      <button  id="addprod" class="btn" type="submit" >Ajouter les données</button>
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