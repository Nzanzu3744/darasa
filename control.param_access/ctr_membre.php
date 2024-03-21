<?php
(empty($_SESSION)) ? session_start() : '';
if (isset($_GET['rtn']) and isset($_GET['idGroupe'])) {
  include("../vue.param_access/profil_Directeur.php");
} else if (isset($_GET['dcxion'])) {
  $_SESSION = array();
  session_destroy();
  include_once('../vue.param_access/login.php');
  // header("Location:../vue.param_access/login.php");
} elseif (isset($_GET['list_membre'])) {
  include_once("../vue.param_access/liste_membre.php");
} elseif (isset($_GET['list_tous_membre'])) {
  include_once("../vue.param_access/liste_membre_all.php");
} else if (isset($_GET['VueMembre'])) {
  include_once('../vue.param_access/membre.php');
} elseif (isset($_GET['btnbas'])) {

  if ($_SESSION['param_utilisateur_ajouter'] == 1) {
?>
    <button id="btnutil" name="btnutil" style="border: 1px solid green; margin-right:60px; width:150px;" class="btn btn-success pull-right btn-xs" onclick="showme('#frmuti','#editLeco','true'); Orientation('../control.param_access/ctr_utilisateur.php?formUt=','#frmuti')"> CREER UTILISATEUR</button>
  <?php
  }

  if ($_SESSION['doc_carte_eleve_afficher'] == 1) {
  ?>
    <button id="btncarte" style="border: 1px solid green; margin-right:60px; width:150px;" class="btn btn-danger pull-right btn-xs" onclick='showme("#frmuti","#editLeco","true"); Orientation("../control.param_access/ctr_carte_access.php?pre_carte_acs=true&idGroupe=<?= $_GET["idGroupe"] ?>","#editLeco");Orientation("../control.param_access/ctr_carte_access.php?form_carte_access=true&idGroupe=<?= $_GET["idGroupe"] ?>","#frmuti")'> CARTES</button>
<?php
  }
} else {
  include_once('../control.param_access/mes_methodes.php');
  echec_controleur('MEMBRE...');
}
