<?php
include_once('../model.param_access/prep_verif_acquis.class.php');
    if(isset($_GET['ajouterVerifAcqui']) AND isset($_GET['idExpl'])){
        $rev= new prep_verif_acquis();
        $rev->ajouter($_GET['idExpl'],$_GET['qst'],$_GET['repo']);
        include_once('../vue.param_access/liste_verif_acquis.php');

    }elseif(isset($_GET['sup_acquis'])){
        $rev= new prep_verif_acquis();
        $rev->supprimer($_GET['idVerif_acq']);
        include_once('../vue.param_access/liste_verif_acquis.php');
    }else{
        include_once('../control.param_access/mes_methodes.php');
        echec_controleur('VERIFICATION DES ACQUIS');
    }
?>