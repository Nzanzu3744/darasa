<!DOCTYPE HTML>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="../bootstrap/dist/css/monstyle.css" rel=stylesheet>
            <script src="../jquery/dist/jquery.min.js"></script>
            
            <!--    -->
            <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
            <!--  -->
            
            <script src="script.js"></script>

            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        </head>
        <body style="font-size:13px;" id="app">

          <div class="col-md-9 col-lg-8 col-xl-8">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Exemple d’image" _mstalt="176397" _msthash="259">
          </div>
          <div class="col-md-8 col-lg-2 col-xl-2 offset-xl-2" style="padding-top:150px">
            <form>
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
                <input id="lg" type="text" class="form-control form-control-lg" placeholder="Entrez un login valide">
                <label class="form-label" for="login" _msttexthash="291785" _msthash="263" style="margin-left: 0px;">login</label>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input id="ps" type="password"class="form-control form-control-lg" placeholder="Entrez le mot de passe" _mstplaceholder="238602" _msthash="264">
                <label class="form-label" for="ps" _msttexthash="157794" _msthash="265" style="margin-left: 0px;">Mot de passe</label>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64px;"></div><div class="form-notch-trailing"></div></div></div>

              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input  class="form-check-input me-2" type="checkbox" onclick="Encours()" value="" id="">
                  <label class="form-check-label" for="form2Example3" _msttexthash="383331" _msthash="266"> Souvenez-vous de moi </label>
                </div>
                <a href="#!" onclick="Encours()" class="text-body" _msttexthash="376129" _msthash="267">Mot de passe oublié?</a>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">

                <button type="button" id="btn_enreg_lecon" onclick="Orientation('../control.param_access/ctr_con.php?lgdfds='+$('#lg').val()+'&ps='+$('#ps').val(),'#app')" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" _msttexthash="256685" _msthash="268">Connectez-vous</button>
                <p class="small fw-bold mt-2 pt-1 mb-0" _msttexthash="2142699" _msthash="269">Vous n’avez pas de compte ? <a href="#!" class="link-danger" onclick="Encour()" _istranslated="1">Registre</a></p>
              </div>

            </form>
          </div>
      </div>
      <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <div>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-google"></i>
          </a>
          <a href="#!" class="text-white">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
        <!-- Right -->                  
    </body>
    
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
</html>  
