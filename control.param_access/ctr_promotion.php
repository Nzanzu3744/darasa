<?php
include_once('../model.param_access/org_promotion.class.php');

if(isset($_GET['ajouterPm']) AND isset($_GET['Promtn']) AND $_GET['Promtn']!='')
{   $promtn = htmlspecialchars($_GET['Promtn']);
    $prom =new org_promotion();
    $prom->ajouter($promtn);
    include("../vue.param_access/form_promotion.php");
}elseif(isset($_GET['SuprPrm'])AND isset($_GET['idPromtn'])){
    $idpromtn = htmlspecialchars($_GET['idPromtn']);
    $prom =new org_promotion();
    $prom->supprimer($idpromtn);
    include("../vue.param_access/form_promotion.php");
}else{
    include_once('../control.param_access/mes_methodes.php');
   echec_controleur('CTR PROMOTION');
   }

?>

