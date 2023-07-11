<?php
include_once('../model.param_access/prep_synthese.class.php');
    if(isset($_GET['ajouterSynth']) AND isset($_GET['idExpl'])){
        $synthz= new prep_synthese();
        $synthz->ajouter($_GET['idExpl'],$_POST['synthEns'],$_POST['synthEle']);
        include_once('../vue.param_access/liste_synthese.php');

    }elseif(isset($_GET['sup_synth'])){
        $synthz= new prep_synthese();
        $synthz->supprimer($_GET['idSynth']);
        include_once('../vue.param_access/liste_synthese.php');
    }else{
        echo "Echec Objectif";
    }
?>