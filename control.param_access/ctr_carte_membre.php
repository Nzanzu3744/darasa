<?php
if (isset($_GET['pre_carte_mbr'])) {
  include("../vue.param_access/form_pre_carte.php");
} elseif (isset($_GET['form_carte_mbr'])) {
  include("../vue.param_access/form_carte.php");
} elseif (isset($_GET['aff_carte'])) {
  include_once('../vue.param_access/grille_carte_membre.php');
} else {
  include_once("../control.param_access/mes_methodes.php");
  echec_controleur('CARTE MEMBRE');
}
