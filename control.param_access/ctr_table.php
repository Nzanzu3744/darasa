<?php
    if(isset($_GET['formTab'])){
      include_once("../vue.param_access/form_table.php");
   }else{
    include_once('../control.param_access/mes_methodes.php');
   echec_controleur('TABLE');
  }
?>