<?php
if (isset($_GET['pre_bull'])) {
  include("../vue.param_access/form_pre_bulletin.php");
} elseif (isset($_GET['form_bulletin'])) {
  include("../vue.param_access/form_bulletin.php");
} elseif (isset($_GET['aff_blt'])) {
  include_once('../vue.param_access/grille_bulletin.php');
} elseif ($_GET['verifBlt']) {
  include_once('../vue.param_access/doc_bulletin.php');
} else {
  include_once('../control.param_access/mes_methodes.php');
  echec_controleur('BULLETIN');
}
