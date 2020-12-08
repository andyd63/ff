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
                <h6>Créer une demande</h6>
                <?php if(isset($errorSuccess)){?>
                <div class="alert alert-success" role="alert">
                   <?=$errorSuccess;?>
              </div><?php }?>
                  <ul class="row">
                    <div class="row">
                      <!-- Name -->
                      <li class="col-md-6">
                        <label>Nom formation
                          <input type="text" id="nomForm"  placeholder=""  >
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Responsable
                          <input type="text" id="respForm"  placeholder=""  >
                        </label>
                      </li>
                    </div>
                    <div class="row">
                      <!-- Name -->
                      <li class="col-md-3">
                        <label>Date de début
                          <input type="date" id="dateDebut"  placeholder=""  >
                        </label>
                      </li>
                      <li class="col-md-3">
                        <label>Date de fin
                          <input type="date" id="dateFin"  placeholder=""  >
                        </label>
                      </li>
                      <li class="col-md-3">
                        <label>Permanent?
                          <input type="checkbox" id="permanent" class="form-check-input " id=""></li>
                        </label>
                      </li>
                    </div>
                    <div class="row">
                      <!-- Name -->
                      <li class="col-md-6">
                        <label>Lieu formation
                          <input type="text" id="lieuFormation"  placeholder=""  >
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Cle internet
                          <input type="number" id="cleInternet" value="0" placeholder=""  >
                        </label>
                      </li>
                    </div>
                    <div class="row">
                      <!-- id -->
                      <li class="col-md-6">
                        <label>Nombre Pc Portable
                          <input type="number" id="nbPcPortable"  value="0" placeholder=""  >
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>nombre Pc Fixe
                          <input type="number" id="nbPcFixe" value="0" placeholder=""  >
                        </label>
                      </li>
                    </div>
                    <div class="row">
                      <!-- id -->
                      <li class="col-md-6">
                        <label>Nombre de souris
                          <input type="number" id="nbSouris" value="0" placeholder=""  >
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Nombre vidéoprojecteur
                          <input type="number" id="nbVideo" value="0" placeholder=""  >
                        </label>
                      </li>
                    </div>
                    <div class="row">
                      <!-- id -->
                      <li class="col-md-6">
                        <label>Nombre de casque audio
                          <input type="number" id="nbCasqueAudio" value="0" placeholder=""  >
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Nombre de casque VR
                          <input type="number" id="nbCasqueVr" value="0"  placeholder=""  >
                        </label>
                      </li>
                    </div>
                    <div class="row">
                      <!-- id -->
                      <li class="col-md-6">
                        <label>Nombre d'imprimante
                          <input type="number" id="nbImprimante" value="0" placeholder=""  >
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Nombre de compte impression
                          <input type="number" id="compteImpression" value="0"  placeholder=""  >
                        </label>
                      </li>
                    </div>
  
              

                    </div>
                    <li class="col-md-12 text-center margin-top-20">
                      <p  id="btnDemande" class="btn" type="submit" >Créer ma demande</button>
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
      $('#btnDemande').click(function(e){ 
        url= 'index.php?c=client&action=demandeForm';

    
        nomForm = document.getElementById("nomForm").value;
        respForm = document.getElementById("respForm").value;
        dateDebut = document.getElementById("dateDebut").value;
        dateFin = document.getElementById("dateFin").value;
        lieuFormation = document.getElementById("lieuFormation").value;
        cleInternet = document.getElementById("cleInternet").value;
        nbPcPortable = document.getElementById("nbPcPortable").value;
        nbPcFixe = document.getElementById("nbPcFixe").value;
        nbSouris = document.getElementById("nbSouris").value;
        nbVideo = document.getElementById("nbVideo").value;
        nbCasqueAudio = document.getElementById("nbCasqueAudio").value;
        nbCasqueVr = document.getElementById("nbCasqueVr").value;
        nbImprimante = document.getElementById("nbImprimante").value;
        compteImpression = document.getElementById("compteImpression").value;

        if( $('#permanent').is(':checked') ){
           permanent = true;
        } else {
           permanent = false;
        }
        if(((permanent != false ) && (dateFin == '') ) || ((permanent == false ) && (dateFin != '') ) ){
          if((dateDebut != '') && (nomForm != '')  && (lieuFormation != '')){
          param = "permanente="+permanent+"&nomForm="+nomForm+ "&respForm="+respForm+"&dateDebut="+dateDebut+"&dateFin="+dateFin+"&lieuFormation="+lieuFormation+ 
          "&cleInternet="+cleInternet+ "&nbPcPortable="+nbPcPortable+"&nbPcFixe="+nbPcFixe+"&nbSouris="+nbSouris+"&nbVideo="+nbVideo+ 
          "&nbCasqueAudio="+nbCasqueAudio+"&nbCasqueVr="+nbCasqueVr+"&nbImprimante="+nbImprimante+  '&compteImpression='+compteImpression;
          reponse = postAjax(param,url);
          rep = jQuery.parseJSON(reponse.responseText);
          alertJs(false,rep.msg);
          setInterval(redirection, 3000);
          }else{
            alertJs(false,"Un champ obligatoire n'est pas rempli.");
          }
        
        }else{
          alertJs(false,"Vous n'avez pas mis de date de fin.");
        } 
      });

      function redirection(){
          window.location = 'index.php?c=client&action=mesdemandes'
      }

      getDataTable('tableCli');
      });
  </script>
  <?php include('./assets/inc/footer.php');?>