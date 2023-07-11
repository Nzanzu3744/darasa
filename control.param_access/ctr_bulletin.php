<?php
(empty($_SESSION))?session_start():'';
if(isset($_GET['pre_bull'])){
    include("../vue.param_access/header_fenetre.php");
    include("../vue.param_access/form_pre_bulletin.php");
    include("../vue.param_access/footer_fenetre.php");

 }elseif(isset($_GET['aff_blt'])){

    include_once('../vue.param_access/grille_bulletin.php');
 }else{
 echo 'ECHEC BLOCG';
 }
?>