<?php
include_once('../model.param_access/org_section.class.php');

if(isset($_GET['ajouterS']) AND isset($_GET['sectn']) AND $_GET['sectn']!='' AND !empty($_POST['data1']))
{  
       
    include_once('../control.param_access/mes_methodes.php');
    $sectn = htmlspecialchars($_GET['sectn']);
    $section =new org_section();
   
    $listeProm=deserialiser($_POST['data1']);

    foreach($listeProm as $lprom){
        $section->ajouter($sectn,$lprom);
    }
    
    include("../vue.param_access/form_section.php");

}elseif(isset($_GET['supsect'])AND isset($_GET['idsectn'])){
    $idsectn = htmlspecialchars($_GET['idsectn']);
    $section =new org_section();
    $section->supprimer($idsectn);
    include("../vue.param_access/form_section.php");
}else{
    include_once('../control.param_access/mes_methodes.php');
   echec_controleur('CTR SECTION');
   }

?>

