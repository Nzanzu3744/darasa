<?php

if (isset($_GET['annul'])) {
    include("../vue.param_access/profil_Eleve.php");
} else if (isset($_GET['Valide'])) {
    include_once("../control.param_access/mes_methodes.php");
    $classes = deserialiser($_POST['data1']);
    if (!empty($classes)) {
        include_once("../model.param_access/org_inscription.class.php");
        include_once("../model.param_access/org_anneesco.class.php");

        $Ins = new org_inscription();
        $sel_A = new org_anneesco();
        $sel_A = $sel_A->selectionnerDerAnEcode($_SESSION['monEcole']['idEcole'])->fetch();
        foreach ($classes as $inscr) {

            $siexist = $Ins->rechercherByClAnneeEleve($inscr, $sel_A['idAnneeSco'], $_GET['idutil'])->fetch();
            if ($siexist != true) {
                $Ins->ajouter($inscr, $sel_A['idAnneeSco'], $_GET['idutil']);
            } else {
                include_once('../control.param_access/mes_methodes.php');
                echec_controleur('ELEVE EST DEJA INSCRIT DANS CETTE CLASSE');
            }
        }

        include("../vue.param_access/profil_Eleve.php");
    } else {
?>
        <center class="col-sm-12" style="color:red; margin-top:15%">VEUILLEZ SELECTINNER UNE CLASSE POUR L\'INSCRIPTION<center>
                <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick="Orientation('../control.param_access/ctr_eleve.php?eleve&idutil=<?= $_GET['idutil'] ?>&idGroupe=<?= $_GET['idGroupe'] ?>','#corps')">Returner</button>
            <?php
        }
    } else if (isset($_GET['idutil']) and isset($_GET['eleve'])) {
        include("../vue.param_access/profil_Eleve.php");
    } else if (isset($_GET['rtn']) and isset($_GET['idGroupe'])) {
        include_once("../vue.param_access/liste_role.php");
    } else if (isset($_GET['supIns'])) {
        $idInsc = htmlspecialchars($_GET['supIns']);
        include_once("../model.param_access/org_inscription.class.php");
        $insc = new org_inscription();
        if ($insc->supprimer($idInsc)) {
            include("../vue.param_access/profil_Eleve.php");
        } else {
            ?>
                <center class="col-sm-12" style="color:red; margin-top:15%">NOUS NE POUVONS PAS SUPPRIME UNE INSCRIPTION DEJA LIEN AUX TRAVAUX<center>
                        <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick="Orientation('control.param_access/ctr_eleve.php?eleve&idutil=<?= $_GET['idutil'] ?>&idGroupe=<?= $_GET['idGroupe'] ?>','#corps')">Returner</button>
                <?php


            };
        } else {
            include_once('../control.param_access/mes_methodes.php');
            echec_controleur('ELEVE');
        }

                ?>