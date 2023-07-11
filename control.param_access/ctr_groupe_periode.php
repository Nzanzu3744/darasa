<?php
include_once('../model.param_access/param_groupe_periode.class.php');
if(isset($_GET['AfficheGroupe_p'])){
    include_once("../vue.param_access/form_groupe_periode.php");


 }else if(isset($_GET['ajouterG'])){
$grp_P2 = new param_groupe_periode();
 $grp_P2->ajouter($_GET['gr_p2'],$_GET['fre47']);
 include_once('../vue.param_access/liste_groupe_periode.php');

 }elseif(isset($_GET['sp'])){
    $grp_P2 = new param_groupe_periode();
    $grp_P2->supprimer($_GET['idgrp']);
 include_once('../vue.param_access/liste_groupe_periode.php');
 }else{
 echo 'ECHEC GROUPE';
 }
?>