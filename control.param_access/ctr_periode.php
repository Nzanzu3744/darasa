<?php
if (isset($_GET['Periode'])) {
    include_once("../vue.param_access/periode.php");
} elseif (isset($_GET['ModP%reu'])) {
    include_once('../model.param_access/org_periode.class.php');
    $idP = htmlspecialchars($_GET['idPerio2']);
    $idAnn = htmlspecialchars($_GET['idann']);
    $periode = htmlspecialchars($_GET['peri02']);
    $dtDebit = htmlspecialchars($_GET['dtD']);
    $dtFin = htmlspecialchars($_GET['dtF']);

    $pr_2 = new org_periode();
    $pr_2->modifierpartiele($idP, $idAnn, $periode, $dtDebit, $dtFin);
    include_once('../vue.param_access/liste_periode.php');
} elseif (isset($_GET['SuprPerio2'])) {
    include_once('../model.param_access/org_periode.class.php');
    $pr_2 = new org_periode();
    $pr_2->supprimer($_GET['idPerio2']);
    include_once('../vue.param_access/liste_periode.php');
} elseif (isset($_GET['selectFrm'])) {

    include_once('../vue.param_access/form_periode.php');
} elseif (isset($_GET['selectPeriod'])) {

    include_once('../vue.param_access/liste_periode.php');
} elseif (isset($_GET['selectProm'])) {
    include_once('../vue.param_access/liste_classe_periode.php');
    // ---------------------------------PROGRAMMATION PERIODE D'ACTIVITE-------------------------------------------------
} elseif (isset($_GET['clssChk'])) {
    $table = array();
    if (!isset($_COOKIE['classSel'])) {
        $table = array($_GET['idClassSel']);
        $tbjsonC = json_encode($table);
        setcookie('classSel', $tbjsonC, (time() + 360 * 10));
    } else {
        $table = json_decode($_COOKIE['classSel']);
        array_push($table, $_GET['idClassSel']);
        $tbjsonC = json_encode($table);
        setcookie('classSel', $tbjsonC, (time() + 360 * 10));
    }
} else if (isset($_GET['Valide'])) {

    if (isset($_COOKIE['classSel'])) {
        $tbClass = array();
        $tbClass = json_decode($_COOKIE['classSel']);

        include_once("../model.param_access/org_periode.class.php");
        $progPer2 = new org_periode();

        $cl = '';
        foreach ($tbClass as $slClass) {
            $cl = $slClass;
            $progPer2->ajouter($slClass, $_GET['idGp'], $_GET['idann'], $_GET['peri02'], $_GET['dtD'], $_GET['dtF']);
        }
        include("../vue.param_access/liste_periode.php");
    } else {

?>
        <center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER AU MOINS UNE CLASSE <center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick="Orientation('control.param_access/ctr_periode.php?selectProm=true&idProm=<?= $_GET['idProm'] ?>','#classeOrg');Orientation('control.param_access/ctr_periode.php?selectPeriod&idann=<?= $_GET['idann'] ?>&annee=<?= $_GET['annee'] ?>&idProm=<?= $_GET['idProm'] ?>','#list_pr2')" class="btn btn-default pull-right col-sm-2">Returner</button>;

        <?php
    }

    //  ---------------------------FIN PROGRAMMATION PERIODE D'ACTIVITE-------------------------------------------------------
} else {
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('PERIODE');
}
        ?>