<?php
include_once('../model.param_access/crs_prepacours.class.php');
include_once('../model.param_access/crs_cours.class.php');
include_once('../control.param_access/mes_methodes.php');

if (isset($_GET['VueClasseAff'])) {
   include("../vue.param_access/cours.php");
} else if (isset($_GET['VueClasseIns'])) {
   include("../vue.param_access/cours_Elve.php");
} else if (isset($_GET['VueClasseDir'])) {
   include("../vue.param_access/cours_directeur.php");
} else if (isset($_GET['VueCoursEleve'])) {
   include("../vue.param_access/cours_eleve_cls.php");
} else if (isset($_GET['VueCoursDirecteur'])) {
   include("../vue.param_access/cours_directeur_cls.php");
} else if (isset($_GET['courssgauche'])) {
   include("../vue.param_access/form_cours.php");
} else if (isset($_GET['courssgauche_dom'])) {
   include("../vue.param_access/form_domaine.php");
} else if (isset($_GET['courssgauche_sdom'])) {
   include("../vue.param_access/form_sous_domaine.php");
} else if (isset($_GET['courssgauche_prepcours'])) {
   include("../vue.param_access/form_prepacours.php");
} else if (isset($_GET['VueCours']) and isset($_GET['idClasse']) and isset($_GET['idAnneeSco'])) {
   include("../vue.param_access/cours_ense_cls.php");
} else if (isset($_GET['VueCours_dir']) and isset($_GET['idClasse']) and isset($_GET['idAnneeSco'])) {
   include("../vue.param_access/cours_directeur_cls.php");
} else if (isset($_GET['rtn']) and isset($_GET['idGroupe'])) {
   include_once("../vue.param_access/liste_role.php");
} else if (isset($_GET['ajouterCrsPre'])) {

   $cours09 = htmlspecialchars($_GET['nomC']);
   $idSousD = htmlspecialchars($_GET['sdomaine']);
   if (crs_prepacours::ajouter($_SESSION['idUtilisateur'], $cours09, $idSousD)) {
      include("../vue.param_access/liste_prepacours.php");
   } else {
      echec_controleur('PREPATION COURS');
   }
} else if (isset($_GET['supCrs']) and $_GET['supCrs'] == true) {

   $crs = new crs_cours();
   $idPrepaCours = htmlspecialchars($_GET['idCrs']);
   $crs->supprimer($idPrepaCours);
   switch ($_GET['fct']) {
      case 'dir':
         include("../vue.param_access/cours_directeur_cls.php");
         break;
      default:
         include("../vue.param_access/cours_ense_cls.php");
   }
} else if (isset($_GET['supPrepacors']) and isset($_GET['idPrepaCours'])) {

   $id = htmlspecialchars($_GET['idPrepaCours']);
   $prepacrs = new crs_prepacours();
   try {
      $prepacrs->supprimer($id);
      include("../vue.param_access/liste_prepacours.php");
   } catch (\Throwable $th) {

      echec_controleur('SUPPRESSION DU COURS');
   }
} else if (isset($_GET['vue_prepacours'])) {
   include("../vue.param_access/fenetre_prepacours.php");
} elseif (isset($_GET['avecImage']) == true) {

   if (!empty($_POST['idPrepaCours']) and !empty($_POST['ponderat']) and !empty($_FILES['image']) and !empty($_POST['ponderat'])) {

      $idPrepaCours = $_POST['idPrepaCours'];
      $pond = $_POST['ponderat'];
      $cmtc = $_POST['CmtC'];
      $idClasse = htmlspecialchars($_GET['idClasse']);
      $idAnneeSco = htmlspecialchars($_GET['idAnneeSco']);
      $crs = new crs_cours();
      $verifExist = $crs->rechercherPrepa($idPrepaCours, $idClasse, $idAnneeSco)->fetch();
      if (empty($verifExist)) {

         $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

         $path  = "../iconCrs/";

         if (is_dir($path) == false) {
            mkdir($path);
         }
         $img = $_FILES['image']['name'];
         $tmp = $_FILES['image']['tmp_name'];
         $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
         $final_image = rand(1000, 1000000) . $img;
         if (in_array($ext, $valid_extensions)) {
            $path = $path . strtolower($final_image);
            if (move_uploaded_file($tmp, $path)) {
               include_once('../model.param_access/org_anneesco.class.php');
               include_once('../model.param_access/org_affectation.class.php');
               $affect = new org_affectation();
               $affect = $affect->rechercherByUtiClsAnnee($_SESSION['idUtilisateur'], $idClasse, $idAnneeSco)->fetch();
               $crs = new crs_cours();
               if ($crs->ajouter($affect['idAffectation'], $affect['idAnneeSco'], $idPrepaCours, $path, $pond, $cmtc)) {
                  return include("../vue.param_access/cours_ense_cls.php");
               } else {

                  echec_controleur("ECHEC D'ENREGISTREMENT COURS. ");
               }
            }
         } else {
            echo 'invalid';
         }
      } else {
         echec_controleur('LE COURS : <a href="#" onclick=alerter("' . $verifExist['cours'] . '")> ' . strtoupper($verifExist['cours']) . '</a> EXISTE DEJA DANS CETTE CLASSE, ENSEIGNE PAR <a href="#" onclick=alerter("Voir_la_direction_de_l_école")>' . strtoupper($verifExist['nomUtilisateur'] . ' ' . $verifExist['postnomUtilisateur'] . ' ' . $verifExist['prenomUtilisateur']) . '</a>');
      }
   } else {
      echo 'champsVide';
   }
} else {

   echec_controleur('COURS');
}
