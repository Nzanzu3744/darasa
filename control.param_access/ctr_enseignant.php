<?php
(empty($_SESSION)) ? session_start() : '';
if (isset($_GET['annul'])) {
    include("../vue.param_access/profil_Enseignant.php");
} else if (isset($_GET['Valide'])) {

    include_once("../control.param_access/mes_methodes.php");
    $classes = deserialiser($_POST['data1']);
    if (!empty($classes)) {
        include_once("../model.param_access/org_affectation.class.php");
        include_once("../model.param_access/org_anneesco.class.php");
        $aff = new org_affectation();
        $sel_A = new org_anneesco();
        $sel_A = $sel_A->selectionnerDerAnEcode($_SESSION['monEcole']['idEcole'])->fetch();
        $siexist = false;
        foreach ($classes as $affect) {

            $siexist = $aff->rechercherByUtiClsAnnee($_GET['idutil'], $affect, $sel_A['idAnneeSco'])->fetch();
            if ($siexist != true) {
                $aff->ajouter($affect, $sel_A['idAnneeSco'], $_GET['idutil'], 1);
            } else {
                include_once('../control.param_access/mes_methodes.php');
                echec_controleur('CETTE UTILISATEUR EST DEJE AFFECTE DANS CETTE CLASSE POUR L\'ANNEE ICI');
            }
        };
        include("../vue.param_access/profil_Enseignant.php");
    } else {
        echo '<center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER UNE CLASSE POUR L\'INSCRIPTION<center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick=Orientation("../control.param_access/ctr_membre.php?rtn=true&idGroupe=' . $_GET['idGroupe'] . '","#corps")>Returner</button>';
    }
} else if (isset($_GET['idutil']) and isset($_GET['enseigna'])) {
    (empty($_SESSION)) ? session_start() : '';




    include("../vue.param_access/profil_Enseignant.php");
} else if (isset($_GET['rtn']) and isset($_GET['idGroupe'])) {
    include_once("../vue.param_access/liste_role.php");
} else if (isset($_GET['liste_ensei'])) {

    include_once('../vue.param_access/liste_enseignant.php');
} else if (isset($_GET['supAff'])) {
    $idAffect = htmlspecialchars($_GET['supAff']);
    include_once("../model.param_access/org_affectation.class.php");
    $insc = new org_affectation();
    if ($insc->supprimer($idAffect)) {
        include("../vue.param_access/profil_Enseignant.php");
    } else {
?>
        <center class="col-sm-12" style="color:red; margin-top:15%">NOUS NE POUVONS PAS SUPPRIME UNE INSCRIPTION DEJA LIEN AUX TRAVAUX<center>
                <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick="Orientation('control.param_access/ctr_enseignant.php?enseignant&idutil=<?= $_GET['idutil'] ?>&idGroupe=<?= $_GET['idGroupe'] ?>','#corps')">Returner</button>
        <?php
    };
} else {
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('ENSEIGNANT');
}
        ?>