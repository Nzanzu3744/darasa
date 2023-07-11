<?php
if(isset($_GET['AfficheAnnee'])){
    include_once("../vue.param_access/anneesco.php");
    
 }else if(isset($_GET['AjouteAnnee'])){
include_once('../model.param_access/org_anneesco.class.php');
$annee = new org_anneesco();
$annee->ajouter($_GET['anneesco'],$_GET['description']);
include_once("../vue.param_access/anneesco.php");

 }else if(isset($_GET['AjouteRapport'])){
  include_once('../vue.param_access/rapport_annuel.php');

 }else{
 echo 'ECHEC ANNEE';
 }
?>