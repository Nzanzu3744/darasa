  <!-- ACTUALITE -->
          <div  class="col-md-9 col-lg-9 col-xl-9" style="">
            <div class="table-responsive" style="height:700px">
              <div>
                <!-- <center class="img-fluid"><img style= "width:100%;height:700px" src="images/avenure.jpg" alt="Tigre"></center>-->
                <center class="img-fluid"><img style= "width:100%;height:700px" src="images/avenure.jpg" alt="Tigre"></center>
                <!-- <center class="img-fluid"><img style= "width:100%;height:700px" src="images/arriereP.png" alt="Tigre"></center> -->
                <!-- <center class="img-fluid"><img style= "width:100%;height:700px" src="images/KAMABALE_12538.jpg" alt="Tigre"></center> -->
              
              </div>
            </div>
          
            </div>
          </div>
          <!-- LOGIN -->
          <div class="col-md-3 col-lg-3 col-xl-3">
            <center class="col-sm-12 col-lg-12 btn-primary" style="padding:2px; margin-top:5px; margin-bottom:10px"><b>C'EST L'ANNIVERSAIRE DE<b> </center>
              <div style="height:300px; border:1px solid pink" class="table-responsive col-md-12 col-lg-12 col-xl-12">
               <section class="row">
               <?php
                for($i=1; $i<=10; $i++){
               ?>
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 " >
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
                   
                    
                  </div>
                  <?php
                }
                  ?>
                </section>
              </div>
           
            <form  style="height:50px" class="col-md-12 col-lg-12 col-xl-12">
              <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3" _msttexthash="378001" _msthash="260">Connectez-vous avec</p>
                <button onclick="Encour()" type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button onclick="Encour()" type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button onclick="Encour()" type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-linkedin-in"></i>
                </button>
              </div>

              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0" _msttexthash="19357" _msthash="261">Ou</p>
              </div>

              <!-- login input -->
              <div class="form-outline mb-4">
                <label class="form-label " for="login" _msttexthash="291785" _msthash="263" style="margin-left: 0px;"><span class="glyphicon glyphicon-user"style="margin:3px;color:#176ac3" ></span>LOGIN</label>
                <input id="lg" type="text" class="form-control form-control-lg" placeholder="Entrez un login valide">
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="ps" style="margin-left: 0px;"><span class="glyphicon glyphicon-lock" style="margin:3px;color:#176ac3" ></span>MOT DE PASSE</label>
                <input id="ps" type="password"class="form-control form-control-lg" placeholder="Entrez le mot de passe">
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64px;"></div><div class="form-notch-trailing"></div></div></div>

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
      </div>
 