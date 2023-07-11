<?php
include_once('../model.param_access/prep_sous_domaine.class.php');
    if(isset($_GET['ajouterSd']) AND isset($_GET['lstsous_d'])){
        $sd = new prep_sous_domaine();
        $sd->ajouter($_GET['lstsous_d']);
        include_once('../vue.param_access/liste_sous_domaine.php');
    }else{
        echo "Echec Sous domaine";
    }
?>