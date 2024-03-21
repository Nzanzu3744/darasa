<?php

include_once('../model.param_access/org_unite.class.php');

if(isset($_GET['ajouterU']) AND isset($_GET['unit']) AND $_GET['unit']!='' AND !empty($_POST['data1']))
{
    $unite = htmlspecialchars($_GET['unit']);
    include_once('../control.param_access/mes_methodes.php');
    $unit =new org_unite();
    
    $listeUnite=deserialiser($_POST['data1']);
     foreach ($listeUnite as $lut) {
        $unit->ajouter($unite,$lut);
     }
    include("../vue.param_access/form_unite.php");

}elseif(isset($_GET['SuprU'])AND isset($_GET['idUnit'])){
        $idUnit = htmlspecialchars($_GET['idUnit']);
        $unite =new org_unite();
        $unite->supprimer($idUnit);
        include("../vue.param_access/form_unite.php");
    
}else {
    include_once('../control.param_access/mes_methodes.php');
   echec_controleur('CTR UNITE');
   }

?>

