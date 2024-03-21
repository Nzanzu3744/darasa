<?php
if(isset($_GET['infos'])){
     include_once("../vue.param_access/infos.php");
}else{
    include_once('../control.param_access/mes_methodes.php');
   echec_controleur('INFO');
}
?>