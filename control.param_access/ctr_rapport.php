<?php
if(isset($_GET['rptCours_ense'])){
     include_once("../vue.param_access/rapportcours_ense.php");
}else{
    echo "Echec Rapport";
}
?>