<?php
include_once('../model.param_access/prep_motivation.class.php');
    if(isset($_GET['ajouterMot']) AND isset($_GET['idExpl'])){
        $moti= new prep_motivation();
        $moti->ajouter($_GET['idExpl'],$_GET['mot'],$_GET['comp']);
        include_once('../vue.param_access/liste_motivation.php');

    }elseif(isset($_GET['sup_mot'])){
        $moti= new prep_motivation();
        $moti->supprimer($_GET['idMot']);
        include_once('../vue.param_access/liste_motivation.php');
    }else{
        echo "Echec Motivation";
    }
?>