<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vue.param_access/script.js"></script> -->
<?php
  if(isset($_GET['formGp'])){
      include_once("../vue.param_access/form_groupe.php");
   }else if(isset($_GET['idGroupe'])){
      include_once("../vue.param_access/liste_permission.php");
   }else if(isset($_GET['formTable'])){
      include_once('../vue.param_access/form_table.php');
  }else if(isset($_GET['formRL'])){
    include_once("../vue.param_access/form_role.php");
  }elseif(isset($_GET['VuePr'])){
    include_once("../vue.param_access/permission.php");

  }elseif(isset($_GET['echeMod'])){
  include_once("../vue.param_access/liste_permission.php");
  }else{
    echo "Echec controleur permission";
  }
?>