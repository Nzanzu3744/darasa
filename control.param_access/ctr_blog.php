<?php
if(isset($_GET['commentaire_cours'])){
    include("../vue.param_access/form_cours.php");
    // echo "XXXXXXXXxx";

 }else if(isset($_GET['AjouteAnnee'])){
include_once('../model.param_access/org_anneesco.class.php');
$annee = new org_anneesco();
$annee->ajouter($_GET['anneesco'],$_GET['description']);

 }else if(isset($_GET['AjouteRapport'])){
  include_once('../vue.param_access/rapport_annuel.php');

 }else{
 echo 'ECHEC COMMNETAIRE';
 }
?>