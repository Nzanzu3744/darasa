<?php
    if(isset($_GET['formTab'])){
      include_once("../vue.param_access/form_table.php");
   }else{
    echo "Echec controleur Annuaire Table";
  }
?>