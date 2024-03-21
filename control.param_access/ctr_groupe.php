<?php
(empty($_SESSION)) ? session_start() : '';

include_once('../model.param_access/param_groupe.class.php');
if (isset($_GET['formGrp'])) {
  include_once("../vue.param_access/form_groupe.php");
} else if (isset($_GET['ajouterGrp'])) {
  include_once('../model.param_access/param_permission.class.php');

  $group1 = htmlspecialchars($_GET['grp']);
  param_groupe::ajouter($group1, $_SESSION['monEcole']['idEcole'], false);

  include_once("../vue.param_access/permission.php");
} else if (isset($_GET['SupprGroupe']) and isset($_GET['idGp'])) {
  $idgrp = htmlspecialchars($_GET['idGp']);
  param_groupe::supprimer($idgrp);
  include_once("../vue.param_access/permission.php");
} elseif (isset($_GET['changeGP'])) {

  include_once('../model.param_access/param_role.class.php');
  $idut = htmlspecialchars($_GET['idutil']);

  $role = new param_role();

  if (isset($_POST['slectbtn01'])) {
    $role->desactiverPrecRlEcole($idut, $_SESSION['monEcole']['idEcole']);
    $group1 = htmlspecialchars($_POST['slectbtn01']);
    param_role::ajouter($group1, $idut);
  } elseif (isset($_POST['data1'])) {
    include_once('../control.param_access/mes_methodes.php');
    $group1 = deserialiser($_POST['data1']);
    foreach ($group1  as $sel) {
      $role->desactiverPrecRlEcole($idut, $_SESSION['monEcole']['idEcole']);
      param_role::ajouter($sel, $idut);
    }
    include_once('../vue.param_access/profil_groupe_utilisateur.php');
  }
} elseif (isset($_GET['nvgroupe'])) {
  include_once('../vue.param_access/profil_groupe_utilisateur.php');
} else {
  include_once('../control.param_access/mes_methodes.php');
  echec_controleur('GROUPE');
}
