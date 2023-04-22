<script src="../vue.param_access/script.js"></script>
<?php
    if(isset($_GET['formGrp'])){
      include_once("../vue.param_access/form_groupe.php");


   }else if(isset($_GET['ajouterGrp'])){
    include_once('../model.param_access/param_groupe.class.php');
    $grp = new param_groupe();
    $grp->ajouter($_GET['grp']);
    include_once("../vue.param_access/permission.php");


    
}else{
    echo "Echec controleur Groupe";
  }
?>