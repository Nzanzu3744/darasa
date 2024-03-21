<?php
include_once('../control.param_access/mes_methodes.php');
include_once('..//model.param_access/param_ecole.class.php');


if (isset($_GET['ajouterEco'])) {
   // $idEcole = htmlspecialchars($_GET['idEcole']);

   $nomEcole = htmlspecialchars($_POST['nomEcole']);
   $deviseEcole = htmlspecialchars($_POST['deviseEcole']);
   $idVilleTerritoire = htmlspecialchars($_POST['idVilleTerritoire']);
   $adresseEcole = htmlspecialchars($_POST['adresseEcole']);
   $bpEcole = htmlspecialchars($_POST['bpEcole']);
   $idUtilisateur = $_SESSION['idUtilisateur'];
   $telephoneEcole1 = htmlspecialchars($_POST['tele1']);
   $telephoneEcole2 = htmlspecialchars($_POST['tele2']);
   $singleEcole = htmlspecialchars($_POST['singleEcole']);
   $mailEcole = htmlspecialchars($_POST['mailEcole']);




   if (!empty($nomEcole)  and !empty($deviseEcole)  and !empty($idVilleTerritoire)  and !empty($adresseEcole) and !empty($telephoneEcole1)  and !empty($telephoneEcole2)  and !empty($singleEcole)  and !empty($mailEcole)) {

      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif',);

      $path  = "../logoEcole/";

      if (is_dir($path) == false) {
         mkdir($path);
      }
      $img = $_FILES['logoEcole']['name'];
      $tmp = $_FILES['logoEcole']['tmp_name'];

      // get uploaded file's extension
      $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

      // can upload same image using rand function
      $final_image = rand(1000, 1000000) . $img;

      // check's valid format
      if (in_array($ext, $valid_extensions)) {
         $path = $path . strtolower($final_image);

         if (move_uploaded_file($tmp, $path)) {
            $idEcole = param_ecole::ajouter($nomEcole, $deviseEcole, $idVilleTerritoire, $adresseEcole, $path, $idUtilisateur, $telephoneEcole1, $telephoneEcole2, $singleEcole, $mailEcole);
            if ($idEcole != false) {
               include_once('..//model.param_access/param_groupe.class.php');
               $idGroupe = param_groupe::ajouter('super_adminX', $idEcole, true);
               include_once('..//model.param_access/param_utilisateur.class.php');
               $admin = param_utilisateur::selectionnerAdmin();
               foreach ($admin as $sel) {
                  param_role::ajouter($idGroupe, $sel['idUtilisateur']);
               }
               return  include("../vue.param_access/ecole.php");
            } else {
               include_once('../control.param_access/mes_methodes.php');
               echec_controleur("ECHEC D'ENREGISTREMENT COURS. ");
            }
         }
      } else {
         echo 'invalid';
      }
   } else {
      echo 'champsVide';
   }
} else if (isset($_GET['VueEcoleAff'])) {
   include("../vue.param_access/ecole.php");
} elseif (isset($_GET['SupprEcole'])) {
   $idEcole = htmlspecialchars($_GET['idEco']);
   $ecole = new param_ecole();
   if ($ecole->supprimer($idEcole)) {
      include("../vue.param_access/ecole.php");
   } else {
      include_once('../control.param_access/mes_methodes.php');
      echec_controleur('SUPPRESSION');
   }
} else if (isset($_GET['frm_ecole'])) {
   include("../vue.param_access/form_ecole.php");
} elseif (isset($_GET['VueEcole'])) {
   include_once('../control.param_access/mes_methodes.php');
   echec_controleur('RESERVE A UN RAPPORT SYNTHESE POUR L\'ECOLE SELECTIONNE');
} else {
   include_once('../control.param_access/mes_methodes.php');
   echec_controleur('ECOLE');
}
