<?php
(empty($_SESSION))?session_start():'';
if(isset($_GET['liste_eleve_cls'])){
    include("../vue.param_access/header_fenetre.php");
    include_once('../vue.param_access/liste_eleve.php');
    include("../vue.param_access/footer_fenetre.php");

 }else{
 echo 'ECHEC CTR ELEVE';
 }
?>