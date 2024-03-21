<?php
include_once('../model.param_access/org_anneesco.class.php');
$annee = new org_anneesco();

if(isset($_GET['AfficheAnnee'])){
  include_once("../vue.param_access/anneesco.php"); 
  
 }else if(isset($_GET['AjouteAnnee'])){
  $annee->ajouter($_GET['anneesco'],$_GET['description'],$_SESSION['monEcole']['idEcole']);
  include_once("../vue.param_access/anneesco.php");

 }else if(isset($_GET['AjouteRapport'])){
  // include_once('../vue.param_access/rapport_annuel.php');


 }elseif(isset($_GET['supAnnee']) and isset($_GET['idAnneeSco']) and !empty($_GET['idAnneeSco'])){
  $idAnn = htmlspecialchars($_GET['idAnneeSco']);

try {
  $annee->supprimer($idAnn);
  include_once("../vue.param_access/anneesco.php");
} catch (\Throwable $th) {
  include_once('../control.param_access/mes_methodes.php');
  echec_controleur('SUPPRESSION DE L\'ANNEE SCOLAIRE');
}

 }else{
   include_once('../control.param_access/mes_methodes.php');
   echec_controleur('ANNEE SCOLAIRE');
 }
?>