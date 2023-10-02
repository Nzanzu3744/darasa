  <!-- ACTUALITE -->
<center  class="row";>
    <div class="table-responsive col-md-8 col-lg-8 col-sm-8 col-xl-8"  >
             
                <!-- <center class="img-fluid"><img style= "width:100%;height:600px" src="images/avenure.jpg" alt="Tigre"></center>-->
                <!-- <img class="img-fluid" style= "width:100%;height:600px" src="images/avenure.jpg" alt="Tigre"> -->
                <!-- <img class="img-fluid" style= "width:100%;height:600px" src="images/R_2.jpg" alt="Tigre"> -->
                <!-- <img class="img-fluid" style= "width:100%;height:600px" src="images/arriereP.png" alt="Tigre"> -->
                <!-- <center class="img-fluid"><img style= "width:100%;height:600px" src="images/KAMABALE_12538.jpg" alt="Tigre"></center> -->
                
            
                      <video autoplay muted loop width="100%" height="100%" >
                            <source src="images/Denouvellescométencespourréussirenligne.mp4" type="video/mp4">
                      </video>
                      <p class="" data-aos="fade-up" data-aos-delay="500">
                         <h1>E-Ecole </h1>
                         <h2> Nous vous Souhaitons le Bienvenue !</h2>
                      </p>
    </div>
    <!-- LOGIN -->
 
    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4" style="background-color:white; height:600px;">
   
        <!--  -->
            <center class="col-sm-12 col-lg-12 btn-primary" style="padding:2px; margin-top:5px; margin-bottom:10px"><b>C'EST L'ANNIVERSAIRE DE</b> </center>
              <div style="height:350px; border:1px solid gray" class="table-responsive">
               <section class="row">
               <?php
                for($i=1; $i<=10; $i++){
               ?>
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 " >
                    <a href="#" class="thumbnail">
                      <img src="images/MADITH_768942.jpg" style="height:100px" class="img-rounded">
                    </a>
                    <a href="#" class="thumbnail">
                      <img src="images/MARTHAN_455842.jpg" style="height:100px" class="img-rounded">
                    </a>
                    <a href="#" class="thumbnail">
                      <img src="images/MUMBESA_241873.jpg" style="height:100px" class="img-rounded">
                    </a><a href="#" class="thumbnail">
                      <img src="images/zaho.png" style="height:100px" class="img-rounded">
                    </a>
                    <a href="#" class="thumbnail">
                      <img src="images/page_1 (14).jpg" style="height:100px" class="img-rounded">
                    </a>
                     <a href="#" class="thumbnail">
                      <img src="images/MADITH_768942.jpg" style="height:100px" class="img-rounded">
                    </a>
                  </div>
                  <?php
                }
                  ?>
                </section>
              </div>
           
           
            <form  style="height:20px;" class="col-md-12 col-lg-12 col-xl-12">
              <!-- login input -->
              <div class="form-outline mb-4">
                <label class="form-label " for="login" _msttexthash="291785" _msthash="263" style="margin-left: 0px;"><span class="glyphicon glyphicon-user"style="margin:3px;color:#176ac3" ></span>LOGIN</label>
                <input id="lg" type="text" class="form-control form-control-lg" placeholder="Entrez un login valide">
              </div>
              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="ps" style="margin-left: 0px;"><span class="glyphicon glyphicon-lock" style="margin:3px;color:#176ac3" ></span>MOT DE PASSE</label>
                <input id="ps" type="password"class="form-control form-control-lg" placeholder="Entrez le mot de passe">
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input  class="form-check-input me-2" type="checkbox" value="" id="">
                  <label  class="form-check-label" for="form2Example3"> Souvenez-vous de moi </label>
                </div>
                <a href="#" onclick="Encour()" class="text-body" _msttexthash="376129" _msthash="267">Mot de passe oublié?</a>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="button" id="btn_enreg_lecon" onclick="Orientation('control.param_access/ctr_con.php?lgdfds='+$('#lg').val()+'&ps='+$('#ps').val(),'#app')" class="btn btn-primary btn-lg btn-floating mx-1" style="padding-left: 2.5rem; padding-right: 2.5rem;"  >Connectez-vous</button>
                <p class="small fw-bold mt-2 pt-1 mb-0" _msttexthash="2142699" _msthash="269">Vous n’avez pas de compte ? <a href="#!" class="link-danger" onclick="Encour()" _istranslated="1">Registre</a></p>
              </div>
            </form>
        <!--  -->
     
      </div>
    <!-- FIN-LOGIN -->
        
         
       
</center>

 