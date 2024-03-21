<?php
if (isset($_GET['pre_carte_acs'])) {
  include("../vue.param_access/form_pre_carte _access.php");
} elseif (isset($_GET['form_carte_access'])) {
  include("../vue.param_access/form_carte_access.php");
} elseif (isset($_GET['aff_carte'])) {
  include_once('../vue.param_access/grille_carte_access.php');
} else {
  include_once("../control.param_access/mes_methodes.php");
  echec_controleur('CARTE ACCES');
}
