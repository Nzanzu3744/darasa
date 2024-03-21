<?php
include_once('../model.param_access/prep_verif_connaissence.class.php');
    if(isset($_GET['ajouterRev']) AND isset($_GET['idExpl'])){
        $rev= new prep_verif_connaissence();
        $rev->ajouter($_GET['idExpl'],$_GET['quest'],$_GET['repons']);
        include_once('../vue.param_access/liste_verif_connaissence.php');

    }elseif(isset($_GET['sup_rev'])){
        $rev= new prep_verif_connaissence();
        $rev->supprimer($_GET['idVerifC']);
        include_once('../vue.param_access/liste_verif_connaissence.php');
    }else{
        include_once('../control.param_access/mes_methodes.php');
   echec_controleur('VERIFICTION CONNAISSENCE');
    }
?>