<?php
if(isset($_GET['contact'])){
     include_once("../vue.param_access/contact.php");
}else{
     include_once('../control.param_access/mes_methodes.php');
     echec_controleur('CONTACTS');
}
?>