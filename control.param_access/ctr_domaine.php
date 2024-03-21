<?php
include_once('../model.param_access/crs_domaine.class.php');

if (isset($_GET['ajouterdom']) and isset($_GET['dmn']) and $_GET['dmn'] != '') {
    $dmn = htmlspecialchars($_GET['dmn']);
    $prom = crs_domaine::ajouter($dmn);
    include("../vue.param_access/form_domaine.php");
} elseif (isset($_GET['SuprDmm']) and isset($_GET['iddmn'])) {
    $iddmn = htmlspecialchars($_GET['iddmn']);
    $prom = new crs_domaine();
    $prom->supprimer($iddmn);
    include("../vue.param_access/form_domaine.php");
} else {
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('CTR DOMAINE');
}
