<?php
if(isset($_GET['AfficheAnnee'])){
    include_once("../vue.param_access/anneesco.php");
 }else if(isset($_GET['AjouteAnnee'])){
include_once('../model.param_access/org_anneesco.class.php');
$annee = new org_anneesco();
$annee->ajouter($_GET['anneesco'],$_GET['description']);

 }else if(isset($_GET['AjouteRapport'])){
  echo 'RAPPORT DE L"ANNEE';
 }else{
 echo 'ECHEC ANNEE';
 }
?>