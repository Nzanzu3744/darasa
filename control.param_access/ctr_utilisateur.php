<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/param_utilisateur.class.php');

if (isset($_GET['formUt'])) {
  include_once("../vue.param_access/form_utilisateur.php");
} else if (isset($_GET['ajouterU'])) {



  $nom = htmlspecialchars($_POST['nom']);
  $postnom = htmlspecialchars($_POST['postnom']);
  $prenom  = htmlspecialchars($_POST['prenom']);
  $idGenre  = htmlspecialchars($_POST['genre']);
  $tel  = htmlspecialchars($_POST['tel']);
  $mail  = htmlspecialchars($_POST['mail']);
  $nompere  = htmlspecialchars($_POST['nompere']);
  $nommere  = htmlspecialchars($_POST['nommere']);
  $idVilleTerritoire  = htmlspecialchars($_POST['idVilleTerritoire']);
  $adresse  = htmlspecialchars($_POST['adresse']);
  $dateNais  = htmlspecialchars($_POST['dateNais']);
  $lieuNais  = htmlspecialchars($_POST['lieuNais']);
  $nnCarteEle  = htmlspecialchars($_POST['nnCarteElect']);
  $idGroupe = htmlspecialchars($_POST['groupe1']);


  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');

  $path  = "../photoProfil/";

  if (is_dir($path) == false) {
    mkdir($path);
  }
  $img = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];

  // get uploaded file's extension
  $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

  // can upload same image using rand function
  $final_image = rand(1000, 1000000) . $img;

  // check's valid format
  if (in_array($ext, $valid_extensions)) {
    $path = $path . strtolower($final_image);

    if (move_uploaded_file($tmp, $path)) {

      if (param_utilisateur::ajouter($nom, $postnom, $prenom, $idGenre, $tel, $mail, $path, $nompere, $nommere, $idVilleTerritoire, $adresse, $dateNais, $lieuNais, $nnCarteEle)) {
        param_utilisateur::selectionnerDsc();
        param_utilisateur::getidutilisateur();
        include_once('../model.param_access/param_role.class.php');

        if (param_role::ajouter($idGroupe,  param_utilisateur::getidutilisateur())) {
          include_once("../vue.param_access/liste_membre.php");
        } else {
          include_once('../control.param_access/mes_methodes.php');
          echec_controleur("ECHEC D'ENREGISTREMENT ROLE. ");
        }
      } else {
        include_once('../control.param_access/mes_methodes.php');
        echec_controleur("ECHEC D'ENREGISTREMENT COURS. ");
      }
    }
  } else {
    echo 'champsVide';
  }
} else if (isset($_GET['profil'])) {
  include_once("../vue.param_access/header_fenetre.php");
  include_once("../vue.param_access/form_modif_utilisateur.php");
  include_once("../vue.param_access/footer_fenetre.php");
} else if (isset($_POST['btn_add'])) {
  $dossier_img = "../images";
  $infosfichier = pathinfo($_FILES['photo']['name']);
  $identifiant = $_POST['nom'] . '_' . mt_rand(0, 1000000) . '.' . $infosfichier['extension'];
  if (is_dir($dossier_img) == false) {
    mkdir($dossier_img);
  }
  move_uploaded_file(
    $_FILES['photo']['tmp_name'],
    $dossier_img . '/' . basename($identifiant)
  );
  $photo = $identifiant;
  $util = new param_utilisateur();
  $idUtilisateur = $_SESSION['idUtilisateur'];
  if ($photo != '') {
    $util->modifier($idUtilisateur, $_POST['nom'], $_POST['postnom'], $_POST['prenom'], $_POST['idGenre'], $_POST['tel'], $_POST['mail'], $photo, $_POST['login'], $_POST['ps']);
    header('location:../index.php');
  } else {
    $util->modifierSP($idUtilisateur, $_POST['nom'], $_POST['postnom'], $_POST['prenom'], $_POST['idGenre'], $_POST['tel'], $_POST['mail'], $_POST['login'], $_POST['ps']);
    header('location:../index.php');
  }
} else {
  include_once('../control.param_access/mes_methodes.php');
  echec_controleur('UTILSATEUR');
}
