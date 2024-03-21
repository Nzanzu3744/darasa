<?php
include_once('../model.param_access/crs_sous_domaine.class.php');
if (isset($_GET['ajouterSd']) and isset($_GET['lstsous_d'])) {
    //ATTENTION ICI SOUS DOMAINE PREPA !!!!!!!!
    include_once('../model.param_access/prep_sous_domaine.class.php');
    prep_sous_domaine::ajouter($_GET['lstsous_d']);
    include_once('../vue.param_access/liste_sous_domaine.php');
} elseif (isset($_GET['ajtSousD'])) {
    $idDom = htmlspecialchars($_GET['idDom']);
    $sdom = htmlspecialchars($_GET['sDom']);
    $chkMd = 0;
    // ($_GET['chkMd'] == 'checked') ? $chkMd = 1 : $chkMd = 0;
    if (crs_sous_domaine::ajouter($sdom, $idDom, $chkMd)) {
        include_once('../vue.param_access/form_sous_domaine.php');
    } else {
        include_once('../control.param_access/mes_methodes.php');
        echec_controleur('AJOUT');
    }
} elseif (isset($_GET['SuprS_Dmm'])) {
    $idsdmn = htmlspecialchars($_GET['idsdmn']);
    if (crs_sous_domaine::supprimer($idsdmn)) {
        include_once('../vue.param_access/form_sous_domaine.php');
    } else {
        include_once('../control.param_access/mes_methodes.php');
        echec_controleur('SUPPRESSION');
    }
} else {
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('SOUS DOMAINE');
}
