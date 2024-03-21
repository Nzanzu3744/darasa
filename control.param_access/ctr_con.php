<?php
// (empty($_SESSION)) ? session_start() : '';
if (isset($_POST['ps']) == true and isset($_POST['lg']) == true or isset($_GET['chgEcole']) != false or isset($_GET['acgrd'])) {

    include_once("../model.param_access/param_connexion.php");
    include_once("../model.param_access/param_utilisateur.class.php");
    include_once("../model.param_access/org_affectation.class.php");
    include_once("../model.param_access/param_ecole.class.php");

    $pwd = null;
    $log = null;

    if (isset($_POST['ps']) and isset($_POST['lg'])) {
        $pwd = htmlspecialchars($_POST['ps']);
        $log = htmlspecialchars($_POST['lg']);
    } else if (isset($_GET['chgEcole'])) {
        $pwd = $_SESSION['pass'];
        $log = $_SESSION['log'];
    } else if (isset($_GET['acgrd'])) {
        $pwd = htmlspecialchars($_GET['pass']);
        $log = htmlspecialchars($_GET['log']);
    } else {
        include_once('../control.param_access/mes_methodes.php');
        echec_controleur('MERCI DE PASSER PAR LE FORMULAIRE DE CONNEXION ');
    }
    //UTILISATEUR IDENTIFIANTS
    $util = new param_utilisateur();
    $mesecoles = new param_ecole();
    // $idEcole = htmlspecialchars($_POST['data1']);

    $sel_Ut = $util->log($log, $pwd);

    if ($sel_Ut == true) {

        $ecoles = $mesecoles->filtrerecolesByRoleUti($sel_Ut['idUtilisateur'])->fetchAll();
        if (isset($_GET['chgEcole']) != false) {
            $monEcole = $mesecoles->rechercher($_GET['idEcole'])->fetch();
        }
        if ($ecoles == true) {
            (isset($_GET['chgEcole']) != false) ? $_SESSION['monEcole'] = $monEcole : $_SESSION['monEcole'] = $ecoles[0];
            $_SESSION['ecole'] = $ecoles;
            $_SESSION['idUtilisateur'] = $sel_Ut['idUtilisateur'];
            $_SESSION['nom'] = $sel_Ut['nomUtilisateur'];
            $_SESSION['postnom'] = $sel_Ut['postnomUtilisateur'];
            $_SESSION['log'] = $sel_Ut['log'];
            $_SESSION['pass'] = $sel_Ut['pass'];
            $_SESSION['prenom'] = $sel_Ut['prenomUtilisateur'];
            $_SESSION['photoUtilisateur'] = $sel_Ut['photoUtilisateur'];
            $_SESSION['telUtilisateur'] = $sel_Ut['telUtilisateur'];
            $_SESSION['mailUtilisateur'] = $sel_Ut['mailUtilisateur'];
            $_SESSION['genre'] = $sel_Ut['genre'];
            $_SESSION['actif'] = $sel_Ut['actif'];
            $_SESSION['urlserver'] = 'http://192.168.173.169:8080';



            include_once('../model.param_access/param_role.class.php');
            $monRole = new param_role();
            $monRole = $monRole->selectionnerDerRoleByUtilEcole($_SESSION['monEcole']['idEcole'], $_SESSION['idUtilisateur'])->fetch();
            include_once('../model.param_access/param_permission.class.php');
            $mesPerm = new param_permission();
            $mesPerm = $mesPerm->selectionnerByIdGroupe($monRole['idGroupe']);
            foreach ($mesPerm as $selPerm) {
                $_SESSION[$selPerm['nomTable'] . '_afficher'] = $selPerm['afficher'];
                $_SESSION[$selPerm['nomTable'] . '_ajouter'] = $selPerm['ajouter'];
                $_SESSION[$selPerm['nomTable'] . '_modifier'] = $selPerm['modifier'];
                $_SESSION[$selPerm['nomTable'] . '_supprimer'] = $selPerm['supprimer'];
            }

            include_once('../vue.param_access/acceuille.php');
        } else {
            header("location:../index.php?mbr=false");
        }
    } else {
        header("location:../index.php?incorrect=true");
    }
} else {
    header("location:../index.php?cnx=true");
}
