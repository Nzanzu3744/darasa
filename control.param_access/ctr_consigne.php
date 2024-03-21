<?php
include_once('../model.param_access/prep_consigne.class.php');
    if(isset($_GET['ajouterConsig']) AND isset($_GET['idExpl'])){
        $rev= new prep_consigne();
        $rev->ajouter($_GET['idExpl'],$_GET['Monconsig'],$_GET['appli']);
        include_once('../vue.param_access/liste_consigne.php');

    }elseif(isset($_GET['sup_consig'])){
        $rev= new prep_consigne();
        $rev->supprimer($_GET['idConsig']);
        include_once('../vue.param_access/liste_consigne.php');
    }else{
        include_once('../control.param_access/mes_methodes.php');
        echec_controleur('CONSIGNE');
    }
?>